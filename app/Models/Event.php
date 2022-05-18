<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Event
 * @package App\Models
 * @version January 29, 2022, 2:05 pm UTC
 *
 * @property string $title
 * @property string $location
 * @property string $bg_type
 * @property string $bg_color
 * @property string $bg_image_path
 * @property string|\Carbon\Carbon $start_date
 * @property string|\Carbon\Carbon $end_date
 * @property string|\Carbon\Carbon $on_sale_date
 * @property string $account_id
 * @property string $event_category_id
 * @property integer $quantity_available
 * @property string $venue_name
 * @property string $venue_name_full
 * @property string $location_address
 * @property string $location_address_line_1
 * @property string $location_address_line_2
 * @property string $location_country
 * @property string $location_country_code
 * @property sttring $location_state
 * @property string $location_post_code
 * @property string $location_street_number
 * @property string $location_lat
 * @property string $location_long
 * @property string $pre_order_display_message
 * @property string $post_order_display_message
 * @property string $social_share_text
 * @property boolean $social_show_facebook
 * @property string $social_link_facekook
 * @property boolean $social_link_linkedin
 * @property string $social_show_linkedin
 * @property boolean $social_show_twitter
 * @property string $social_link_twitter
 * @property boolean $is_live
 */
class Event extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'events';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'location' => 'string',
        'bg_type' => 'string',
        'bg_color' => 'string',
        'bg_image_path' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'on_sale_date' => 'datetime',
        'account_id' => 'string',
        'event_category_id' => 'string',
        'quantity_available' => 'integer',
        'venue_name' => 'string',
        'venue_name_full' => 'string',
        'location_address' => 'string',
        'location_address_line_1' => 'string',
        'location_address_line_2' => 'string',
        'location_country' => 'string',
        'location_country_code' => 'string',
        'location_post_code' => 'string',
        'location_street_number' => 'string',
        'location_lat' => 'string',
        'location_long' => 'string',
        'pre_order_display_message' => 'string',
        'post_order_display_message' => 'string',
        'social_share_text' => 'string',
        'social_show_facebook' => 'boolean',
        'social_link_facekook' => 'string',
        'social_link_linkedin' => 'boolean',
        'social_show_linkedin' => 'string',
        'social_show_twitter' => 'boolean',
        'social_link_twitter' => 'string',
        'is_live' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
