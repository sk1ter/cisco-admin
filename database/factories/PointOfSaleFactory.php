<?php


namespace Database\Factories;


use App\Models\PointOfSale;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointOfSaleFactory extends Factory
{
    protected $model = PointOfSale::class;

    public function definition()
    {
       return [
           'url' => $this->faker->url,
           'name' => $this->faker->company,
           'description' => $this->faker->text,
           'phone' => $this->faker->phoneNumber,
           'address' => $this->faker->address,
           'image_url' => $this->faker->imageUrl()
       ];
    }
}
