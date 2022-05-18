<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\BaseRepository;

/**
 * Class AdminRepository
 * @package App\Repositories
 * @version January 29, 2022, 1:42 pm UTC
*/

class AdminRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'password'
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
        return Admin::class;
    }
}
