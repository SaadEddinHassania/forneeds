<?php

namespace App\Repositories;

use App\Models\Answer;
use InfyOm\Generator\Common\BaseRepository;

class AnswerRepository extends BaseRepository
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
        return Answer::class;
    }
}
