<?php

namespace App\Repositories;

use App\Models\ServiceProvider;
use InfyOm\Generator\Common\BaseRepository;

class ServiceProviderRepository extends BaseRepository
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
        return ServiceProvider::class;
    }

    public function getActiveServiceProvider(){
        return ServiceProvider::where('user_id','!=',null);
    }
}
