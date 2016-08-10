<?php

namespace App\Repositories;

use App\Models\ServiceType;
use InfyOm\Generator\Common\BaseRepository;

class ServiceTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ServiceType::class;
    }
}
