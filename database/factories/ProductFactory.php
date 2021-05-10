<?php


namespace Database\Factories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'image_url' => $this->faker->imageUrl(),
            'description' => $this->faker->text,
            'particular_qualities' => $this->faker->text,
            'characteristics' => $this->faker->text
        ];
    }
}
