<?php

namespace Menvel\Setting\Events;

use Illuminate\Queue\SerializesModels as SerializationTrait;

class Keying
{
    use SerializationTrait;

    /**
     * @var \Illuminate\Http\Request
     */
    public $data;

    /**
     * @param \Illuminate\Http\Request $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
}