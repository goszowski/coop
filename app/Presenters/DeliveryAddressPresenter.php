<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class DeliveryAddressPresenter extends Presenter {

    public function fullName()
    {
    	return $this->address . ', ' . $this->area->present()->fullName;
    }

}