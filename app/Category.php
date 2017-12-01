<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Category extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\CategoryPresenter';

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
    protected $fillable = ['parent_category_id', 'name'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

}
