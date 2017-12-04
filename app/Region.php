<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\ResponseCache\Facades\ResponseCache;

class Region extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'position',
        'sort_when_creating' => true,
    ];
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

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
    protected $fillable = ['name'];

    public function areas()
    {
        return $this->hasMany(Area::class, 'region_id');
    }

    public static function create(array $attributes = [])
    {
        $model = parent::query()->create($attributes);

        ResponseCache::flush();

        return $model;
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
