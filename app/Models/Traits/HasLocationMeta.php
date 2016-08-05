<?php

namespace Traits;

Trait HasLocationMeta {

    public function Meta() {
        return $this->hasOne('App\Models\LocationMeta');
    }

}
