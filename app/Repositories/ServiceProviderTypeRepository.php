<?php

namespace App\Repositories;

use App\Models\ServiceProviderType;
use InfyOm\Generator\Common\BaseRepository;

class ServiceProviderTypeRepository extends BaseRepository
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
        return ServiceProviderType::class;
    }
}
