<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Spatie\ResponseCache\Facades\ResponseCache;

class Area extends Model {

	use PresentableTrait;

	protected $presenter = 'App\Presenters\AreaPresenter';

	protected $table      = 'areas';
	protected $fillable   = ['region_id', 'name'];

	public function region()
	{
		return $this->belongsTo(Region::class, 'region_id');
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
