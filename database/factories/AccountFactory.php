<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'email' => $this->faker->word,
        'name' => $this->faker->word,
        'address1' => $this->faker->word,
        'address2' => $this->faker->word,
        'city' => $this->faker->word,
        'state' => $this->faker->word,
        'postal_code' => $this->faker->word,
        'is_active' => $this->faker->word,
        'is_banned' => $this->faker->word,
        'is_beta' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
