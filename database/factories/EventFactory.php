<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'location' => $this->faker->word,
        'bg_type' => $this->faker->word,
        'bg_color' => $this->faker->word,
        'bg_image_path' => $this->faker->word,
        'start_date' => $this->faker->date('Y-m-d H:i:s'),
        'end_date' => $this->faker->date('Y-m-d H:i:s'),
        'on_sale_date' => $this->faker->date('Y-m-d H:i:s'),
        'account_id' => $this->faker->word,
        'event_category_id' => $this->faker->word,
        'quantity_available' => $this->faker->randomDigitNotNull,
        'venue_name' => $this->faker->word,
        'venue_name_full' => $this->faker->word,
        'location_address' => $this->faker->word,
        'location_address_line_1' => $this->faker->word,
        'location_address_line_2' => $this->faker->word,
        'location_country' => $this->faker->word,
        'location_country_code' => $this->faker->word,
        'location_state' => $this->faker->word,
        'location_post_code' => $this->faker->word,
        'location_street_number' => $this->faker->word,
        'location_lat' => $this->faker->word,
        'location_long' => $this->faker->word,
        'pre_order_display_message' => $this->faker->text,
        'post_order_display_message' => $this->faker->text,
        'social_share_text' => $this->faker->text,
        'social_show_facebook' => $this->faker->word,
        'social_link_facekook' => $this->faker->word,
        'social_link_linkedin' => $this->faker->word,
        'social_show_linkedin' => $this->faker->word,
        'social_show_twitter' => $this->faker->word,
        'social_link_twitter' => $this->faker->word,
        'is_live' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
