<?php

namespace App\Repositories;

use App\Models\TicketStatus;
use App\Repositories\BaseRepository;

/**
 * Class TicketStatusRepository
 * @package App\Repositories
 * @version January 29, 2022, 1:10 pm UTC
*/

class TicketStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return TicketStatus::class;
    }
}
