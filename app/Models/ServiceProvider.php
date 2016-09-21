<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;


/**
 * @SWG\Definition(
 *      definition="ServiceProvider",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mission_statement",
 *          description="mission_statement",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="service_provider_type_id",
 *          description="service_provider_type_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sector_id",
 *          description="sector_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ServiceProvider extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'mission_statement',
        'user_id',
        'service_provider_type_id',
        'sector_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mission_statement' => 'string',
    ];
    protected $appends = array('name', 'sectorsString');

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function getNameAttribute()
    {
        if ($this->user()->exists()) {
            return $this->user()->first()->name;
        } else {
            return "No User";
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function serviceProviderType()
    {
        $this->belongsTo(ServiceProviderType::class);
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class);
    }

    public function getSectorsStringAttribute()
    {
        $sectors = $this->sectors()->get()->toArray();
        if (emptyArray($sectors)) {
            return "No Sectors";
        } else {
            return implode(',', $sectors);
        }
    }

    public function beneficiaries(){
        return $this->belongsToMany(Beneficiary::class);
    }
}
