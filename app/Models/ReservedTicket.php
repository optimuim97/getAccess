<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ReservedTicket
 * @package App\Models
 * @version January 29, 2022, 1:16 pm UTC
 *
 * @property string $ticket_id
 * @property string $event_id
 * @property integer $quantity_reserved
 * @property string|\Carbon\Carbon $expires
 */
class ReservedTicket extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'reserved_tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ticket_id',
        'event_id',
        'quantity_reserved',
        'expires'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ticket_id' => 'string',
        'event_id' => 'string',
        'quantity_reserved' => 'integer',
        'expires' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
