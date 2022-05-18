<?php

namespace Database\Factories;

use App\Models\Organiser;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganiserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organiser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => $this->faker->word,
        'name' => $this->faker->word,
        'about' => $this->faker->text,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'faceboob' => $this->faker->word,
        'twitter' => $this->faker->word,
        'logo_path' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
