<?php

namespace Menvel\Setting\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const UPDATED_AT = 'updated_at';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string
     */
    protected $primaryKey = 'key';

    /**
     * @var array
     */
    protected $fillable = [ 'key', 'value', ];

    /**
     * @var array
     */
    protected $hidden = [];
}