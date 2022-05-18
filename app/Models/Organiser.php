<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Organiser
 * @package App\Models
 * @version January 29, 2022, 1:47 pm UTC
 *
 * @property string $account_id
 * @property string $name
 * @property string $about
 * @property string $email
 * @property string $phone
 * @property string $faceboob
 * @property string $twitter
 * @property string $logo_path
 */
class Organiser extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'organisers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'account_id',
        'name',
        'about',
        'email',
        'phone',
        'faceboob',
        'twitter',
        'logo_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_id' => 'string',
        'name' => 'string',
        'about' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'faceboob' => 'string',
        'twitter' => 'string',
        'logo_path' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
