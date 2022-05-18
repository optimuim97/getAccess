<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderStatus
 * @package App\Models
 * @version January 29, 2022, 1:08 pm UTC
 *
 * @property string $name
 */
class OrderStatus extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_statuses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
