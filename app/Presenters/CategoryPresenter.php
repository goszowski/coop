<?php 

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class CategoryPresenter extends Presenter {

    public function fullName()
    {
    	$fullNames[] = $this->name;

    	$category = $this;
    	while($category->parent)
    	{
    		$category = $category->parent;
    		$fullNames[] = $category->name;
    	}

        krsort($fullNames);

    	return implode($fullNames, ' > ');
    }

}