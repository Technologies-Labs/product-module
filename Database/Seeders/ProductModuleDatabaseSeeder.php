<?php

namespace Modules\ProductModule\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ProductModule\Entities\Product;

class ProductModuleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Product::factory(10000)->create();

        // $this->call("OthersTableSeeder");
    }
}
