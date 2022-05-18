<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Admin
 * @package App\Models
 * @version January 29, 2022, 1:42 pm UTC
 *
 * @property string $account_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $password
 */
class Admin extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'admins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'account_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_id' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
