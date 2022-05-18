<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TicketStatus
 * @package App\Models
 * @version January 29, 2022, 1:10 pm UTC
 *
 * @property string $name
 */
class TicketStatus extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ticket_statuses';
    

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
