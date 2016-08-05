<?php

namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Builder;

trait HasLocationMeta {

    public function Meta() {
        return $this->hasOne('App\Models\LocationMeta');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();

        static::addGlobalScope('Meta', function(Builder $builder) {
            $builder->with('Meta');
        });
      
    }

}
