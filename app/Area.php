<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

  protected $table      = 'areas';
  protected $fillable   = ['region_id', 'name'];

  public function region()
  {
    return $this->belongsTo(Region::class, 'region_id');
  }

}
