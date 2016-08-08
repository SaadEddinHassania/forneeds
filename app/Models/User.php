<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="User",
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
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobile",
 *          description="mobile",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="avatar",
 *          description="avatar",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="location_meta_id",
 *          description="location_meta_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="facebook_token",
 *          description="facebook_token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="facebook_id",
 *          description="facebook_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="google_token",
 *          description="google_token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="google_id",
 *          description="google_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="national_id",
 *          description="national_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="verified",
 *          description="verified",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_sp",
 *          description="is_sp",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="is_ready",
 *          description="is_ready",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="token",
 *          description="token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="api_token",
 *          description="api_token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="remember_token",
 *          description="remember_token",
 *          type="string"
 *      )
 * )
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'avatar',
        'dob',
        'location_meta_id',
        'facebook_token',
        'facebook_id',
        'google_token',
        'google_id',
        'national_id',
        'verified',
        'is_sp',
        'is_ready',
        'token',
        'api_token',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'mobile' => 'string',
        'avatar' => 'string',
        'dob' => 'datetime',
        'location_meta_id' => 'integer',
        'facebook_token' => 'string',
        'facebook_id' => 'string',
        'google_token' => 'string',
        'google_id' => 'string',
        'national_id' => 'string',
        'verified' => 'boolean',
        'is_sp' => 'boolean',
        'is_ready' => 'boolean',
        'token' => 'string',
        'api_token' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
