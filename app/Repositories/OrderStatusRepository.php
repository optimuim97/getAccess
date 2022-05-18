<?php

namespace App\Repositories;

use App\Models\OrderStatus;
use App\Repositories\BaseRepository;

/**
 * Class OrderStatusRepository
 * @package App\Repositories
 * @version January 29, 2022, 1:08 pm UTC
*/

class OrderStatusRepository extends BaseRepository
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
        return OrderStatus::class;
    }
}
