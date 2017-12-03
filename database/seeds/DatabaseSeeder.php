<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	foreach(['Пакети', 'Кульки'] as $a=>$categoryName)
    	{
    		$category = Category::create([
    			'name' => $categoryName,
    		]);

    		for($b=1; $b<50; $b++)
    		{
    			Product::create([
    				'category_id' => $category->id,
    				'name' => 'Товар ' . $a.$b,
    				'price' => mt_rand(100, 500),
    				'count_in_pack' => mt_rand(100, 1000),
    			]);
    		}
    	}
    }
}
