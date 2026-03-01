<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Updates global_settings to use logo.svg for all logo keys.
     *
     * @return void
     */
    public function up()
    {
        $logoKeys = ['light_logo', 'dark_logo', 'favicon', 'white_logo', 'front_logo'];
        foreach ($logoKeys as $key) {
            DB::table('global_settings')
                ->where('key', $key)
                ->update(['value' => 'logo.svg']);
        }
        DB::table('global_settings')
            ->where('key', 'navbar_title')
            ->update(['value' => 'ClassKira']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('global_settings')
            ->where('key', 'navbar_title')
            ->update(['value' => 'classkira8']);
        $defaults = [
            'light_logo' => 'light-logo.png',
            'dark_logo' => '16630508541.png',
            'favicon' => 'favicon.png',
            'white_logo' => 'white_logo.png',
            'front_logo' => '17001224705.png',
        ];
        foreach ($defaults as $key => $value) {
            DB::table('global_settings')
                ->where('key', $key)
                ->update(['value' => $value]);
        }
    }
};
