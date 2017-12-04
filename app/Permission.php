<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
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
