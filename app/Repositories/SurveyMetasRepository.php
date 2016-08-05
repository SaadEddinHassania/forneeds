<?php

namespace App\Repositories;

use App\Models\SurveyMetas;
use InfyOm\Generator\Common\BaseRepository;

class SurveyMetasRepository extends BaseRepository
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
        return SurveyMetas::class;
    }
}
