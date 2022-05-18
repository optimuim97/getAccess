<?php

namespace App\Repositories;

use App\Models\Organiser;
use App\Repositories\BaseRepository;

/**
 * Class OrganiserRepository
 * @package App\Repositories
 * @version January 29, 2022, 1:47 pm UTC
*/

class OrganiserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Organiser::class;
    }
}
