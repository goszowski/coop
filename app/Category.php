<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\ResponseCache\Facades\ResponseCache;

class Category extends Model implements Sortable
{
    use PresentableTrait, SortableTrait;

    protected $presenter = 'App\Presenters\CategoryPresenter';

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_category_id', 'name', 'slug'];

    protected $descendantsArr = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function descendants()
    {
        foreach($this->children as $child)
        {
            $this->descendantsArr[] = $child;
            if($child->children)
            {
                $child->descendants();
            }
        }

        return $this->descendantsArr;
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_category_id');
    }

    public function breadcrumbs()
    {
        $output = [];

        $category = $this;
        $output[] = $category;

        while($category->parent)
        {
            $category = $category->parent;
            $output[] = $category;
        }

        krsort($output);

        return $output;
    }

    public static function create(array $attributes = [])
    {
        $slug = str_slug($attributes['name']);
        $attributes['slug'] = $slug;

        $category = parent::query()->create($attributes);

        // dd($category->breadcrumbs());

        if($category->parent)
        {
            $category->slug = $category->parent->slug . '/' . $category->slug;
            $category->save();
        }

        ResponseCache::flush();

        return $category;
    }

    public function update(array $attributes = [], array $options = [])
    {
        parent::update($attributes, $options);

        ResponseCache::flush();
    }

    public function delete()
    {
        parent::delete();

        ResponseCache::flush();
    }

    public function save(array $options = [])
    {
        parent::save($options);

        ResponseCache::flush();
    }

}
