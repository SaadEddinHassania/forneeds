<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Config",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="user_attr_name",
 *          description="user_attr_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="coefficient",
 *          description="coefficient",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="operator",
 *          description="operator",
 *          type="string"
 *      )
 * )
 */
class Config extends Model
{
    use SoftDeletes;

    public $table = 'configs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_attr_name',
        'coefficient',
        'operator',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_attr_name' => 'string',
        'coefficient' => 'string',
        'operator' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function surveys(){
        return $this->belongsToMany(Survey::class);
    }
}
