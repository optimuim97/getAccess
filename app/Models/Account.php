<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Rorecek\Ulid\HasUlid;

/**
 * Class Account
 * @package App\Models
 * @version January 29, 2022, 1:31 pm UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $name
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property boolean $is_active
 * @property boolean $is_banned
 * @property boolean $is_beta
 */
class Account extends Model
{
    use SoftDeletes, HasFactory, HasUlid;

    public $table = 'accounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'email',
        'name',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'is_active',
        'is_banned',
        'is_beta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'name' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'postal_code' => 'string',
        'is_active' => 'boolean',
        'is_banned' => 'boolean',
        'is_beta' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
