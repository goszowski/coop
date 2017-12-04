<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Laracasts\Presenter\PresentableTrait;
use Spatie\ResponseCache\Facades\ResponseCache;

class DeliveryAddress extends Model
{
    use PresentableTrait;

    protected $presenter = 'App\Presenters\DeliveryAddressPresenter';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_addresses';

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
    protected $fillable = ['user_id', 'area_id', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function scopeOwn($query)
    {
        return $query->where('user_id', Auth::id());
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
