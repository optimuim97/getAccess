<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

/**
 * Class EventRepository
 * @package App\Repositories
 * @version January 29, 2022, 2:05 pm UTC
*/

class EventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'location',
        'bg_type',
        'bg_color',
        'bg_image_path',
        'start_date',
        'end_date',
        'on_sale_date',
        'account_id',
        'event_category_id',
        'quantity_available',
        'venue_name',
        'venue_name_full',
        'location_address',
        'location_address_line_1',
        'location_address_line_2',
        'location_country',
        'location_country_code',
        'location_state',
        'location_post_code',
        'location_street_number',
        'location_lat',
        'location_long',
        'pre_order_display_message',
        'post_order_display_message',
        'social_share_text',
        'social_show_facebook',
        'social_link_facekook',
        'social_link_linkedin',
        'social_show_linkedin',
        'social_show_twitter',
        'social_link_twitter',
        'is_live'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Event::class;
    }
}
