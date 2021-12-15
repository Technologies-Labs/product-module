<?php

namespace Modules\ProductModule\Database\factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CategoryModule\Entities\Category;
use Modules\ProductModule\Entities\ProductStatus;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\ProductModule\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl,
            'description' => $this->faker->paragraph,
            'details' => $this->faker->paragraph,
            'position' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(1, 200),
            'old_price' => $this->faker->numberBetween(1, 200),
            'count' => $this->faker->numerify('12'),
            'is_offer' => $this->faker->boolean,
            'offer_ratio' => $this->faker->numberBetween(1, 200),
            'user_id' => User::inRandomOrder()->first()->id,
            'product_status_id' => ProductStatus::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
