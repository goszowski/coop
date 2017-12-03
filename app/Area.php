<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Area extends Model {

	use PresentableTrait;

	protected $presenter = 'App\Presenters\AreaPresenter';

	protected $table      = 'areas';
	protected $fillable   = ['region_id', 'name'];

	public function region()
	{
		return $this->belongsTo(Region::class, 'region_id');
	}

}
