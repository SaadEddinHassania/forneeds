<?php

namespace App\Repositories;

use App\Models\Citizen;
use App\User;
use InfyOm\Generator\Common\BaseRepository;

class CitizenRepository extends BaseRepository
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
        return Citizen::class;
    }

    public function getActiveCitizen(){
        return Citizen::where('user_id','!=',null);
    }
}
