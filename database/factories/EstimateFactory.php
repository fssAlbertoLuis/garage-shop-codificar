<?php

namespace Database\Factories;

use App\Models\Estimate;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstimateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estimate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTime;
        return [
            'customer_name' => $this->faker->name,
            'vendor_name' => $this->faker->name,
            'description' => $this->faker->text,
            'estimate_value' => $this->faker->randomDigit,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
