<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class AreaPresenter extends Presenter {

    public function fullName()
    {
    	return $this->name . ', ' . $this->region->name . ' область';
    }

}