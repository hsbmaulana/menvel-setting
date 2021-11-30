<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateSettingsTable extends Migration
{
    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $key;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->provider = Auth::guard()->getProvider()->createModel()->getTable();
        $this->key = Str::of($this->provider)->singular() . '_' . 'id';
    }

    /**
     * @return void
     */
    public function up()
    {
        $provider = $this->provider;
        $key = $this->key;

        Schema::create('settings', function (Blueprint $table) use ($provider, $key) {

            $table->char('key', 255);

            $table->text('value');
            $table->unsignedBigInteger($key);

            $table->timestamp('updated_at')->nullable(true);

            $table->primary([ 'key', $key, ]);
            $table->foreign($key)->references('id')->on($provider)->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('settings');
    }
}