<?php

namespace App\Repositories;

use App\Models\MarginalizedSituation;
use InfyOm\Generator\Common\BaseRepository;

class MarginalizedSituationRepository extends BaseRepository
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
        return MarginalizedSituation::class;
    }
}
