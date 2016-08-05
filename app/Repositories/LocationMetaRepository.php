<?php

namespace App\Repositories;

use App\Models\LocationMeta;
use InfyOm\Generator\Common\BaseRepository;

class LocationMetaRepository extends BaseRepository
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
        return LocationMeta::class;
    }
}
