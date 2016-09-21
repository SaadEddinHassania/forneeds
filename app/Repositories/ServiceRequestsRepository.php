<?php

namespace App\Repositories;

use App\Models\ServiceRequest;
use InfyOm\Generator\Common\BaseRepository;

class ServiceRequestsRepository extends BaseRepository
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
        return ServiceRequest::class;
    }
}
