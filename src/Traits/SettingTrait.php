<?php

namespace Menvel\Setting\Traits;

use Menvel\Setting\Models\Setting;

trait SettingTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function sets()
    {
        return $this->hasMany(Setting::class);
    }
}