<?php

namespace Menvel\Setting\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope as IScope;

class StrictScope implements IScope
{
    /**
     * @var string
     */
    public static $space = 'feature';

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('key', 'not like', static::$space . '.' . '%');
    }
}