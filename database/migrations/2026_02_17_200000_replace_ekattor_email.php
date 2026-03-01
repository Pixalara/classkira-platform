<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Replace classkira@domain.com with classkira@domain.com in global_settings.
     *
     * @return void
     */
    public function up()
    {
        $rows = DB::table('global_settings')
            ->whereIn('key', ['system_email', 'contact_email'])
            ->get();
        foreach ($rows as $row) {
            if (stripos($row->value, 'classkira') !== false) {
                $new = str_ireplace('classkira@domain.com', 'classkira@domain.com', $row->value);
                $new = str_ireplace('classkira@', 'classkira@', $new);
                DB::table('global_settings')->where('id', $row->id)->update(['value' => $new]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $rows = DB::table('global_settings')
            ->whereIn('key', ['system_email', 'contact_email'])
            ->get();
        foreach ($rows as $row) {
            if (stripos($row->value, 'classkira') !== false) {
                $new = str_ireplace('classkira@domain.com', 'classkira@domain.com', $row->value);
                DB::table('global_settings')->where('id', $row->id)->update(['value' => $new]);
            }
        }
    }
};
