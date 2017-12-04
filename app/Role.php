<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ResponseCache\Facades\ResponseCache;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     *
     * @return mixed
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
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
