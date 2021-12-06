<?php

namespace Menvel\Setting\Repositories\Eloquent;

use Error;
use Exception;
use Illuminate\Support\Facades\DB;
use Menvel\Setting\Models\Setting;
use Menvel\Setting\Scopes\StrictScope;
use Menvel\Setting\Events\Keying;
use Menvel\Setting\Events\Keyed;
use Menvel\Repository\AbstractRepository;
use Menvel\Setting\Contracts\Repository\ISettingRepository;

class SettingRepository extends AbstractRepository implements ISettingRepository
{
    /**
     * @param array $querystring
     * @return mixed
     */
    public function all($querystring = [])
    {
        $user = $this->user; $content = null;

        $content = $user->load('sets')->loadCount('sets');

        return $content;
    }

    /**
     * @param int|string $identifier
     * @param array $data
     * @return mixed
     */
    public function modify($identifier, $data)
    {
        $user = $this->user; $content = null;

        DB::beginTransaction();

        try {

            $content = $user->sets()->withoutGlobalScope(StrictScope::class)->updateOrCreate([ 'key' => $identifier, ], [ 'value' => $data['value'], ]);

            DB::commit();

            event(new Keyed($content));

        } catch (Exception $exception) {

            DB::rollback();
        }

        return $content;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setup($key, $value)
    {
        return $this->modify($key, [ 'value' => $value, ]);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function setdown($key)
    {
        return $this->modify($key, [ 'value' => null, ]);
    }
}