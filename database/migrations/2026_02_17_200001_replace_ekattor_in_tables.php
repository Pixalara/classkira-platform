<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Replace Ekattor/Ekattor8 with ClassKira at table level.
     * Tables: global_settings, language, faq
     *
     * @return void
     */
    public function up()
    {
        $replace = ['Ekattor8' => 'ClassKira', 'Ekattor 8' => 'ClassKira', 'Ekattor' => 'ClassKira'];

        // global_settings - value column
        $rows = DB::table('global_settings')->get();
        foreach ($rows as $row) {
            $val = $row->value;
            if ($val && (stripos($val, 'ekattor') !== false)) {
                $new = str_ireplace(array_keys($replace), array_values($replace), $val);
                DB::table('global_settings')->where('id', $row->id)->update(['value' => $new]);
            }
        }

        // language - phrase and translated columns
        $rows = DB::table('language')->get();
        foreach ($rows as $row) {
            $phrase = $row->phrase;
            $translated = $row->translated;
            $newPhrase = ($phrase && stripos($phrase, 'ekattor') !== false)
                ? str_ireplace(array_keys($replace), array_values($replace), $phrase) : $phrase;
            $newTranslated = ($translated && stripos($translated, 'ekattor') !== false)
                ? str_ireplace(array_keys($replace), array_values($replace), $translated) : $translated;
            if ($newPhrase !== $phrase || $newTranslated !== $translated) {
                DB::table('language')->where('id', $row->id)->update([
                    'phrase' => $newPhrase,
                    'translated' => $newTranslated,
                ]);
            }
        }

        // faq - title, description
        $rows = DB::table('faq')->get();
        foreach ($rows as $row) {
            $title = $row->title;
            $desc = $row->description;
            $newTitle = ($title && stripos($title, 'ekattor') !== false)
                ? str_ireplace(array_keys($replace), array_values($replace), $title) : $title;
            $newDesc = ($desc && stripos($desc, 'ekattor') !== false)
                ? str_ireplace(array_keys($replace), array_values($replace), $desc) : $desc;
            if ($newTitle !== $title || $newDesc !== $desc) {
                DB::table('faq')->where('id', $row->id)->update([
                    'title' => $newTitle,
                    'description' => $newDesc,
                ]);
            }
        }

        // schools - title, address, school_info
        if (Schema::hasTable('schools')) {
            $rows = DB::table('schools')->get();
            foreach ($rows as $row) {
                $upd = [];
                foreach (['title', 'address', 'school_info'] as $col) {
                    $val = $row->{$col} ?? null;
                    if ($val && stripos($val, 'ekattor') !== false) {
                        $upd[$col] = str_ireplace(array_keys($replace), array_values($replace), $val);
                    }
                }
                if (!empty($upd)) {
                    DB::table('schools')->where('id', $row->id)->update($upd);
                }
            }
        }

        // noticeboard - notice_title, notice
        if (Schema::hasTable('noticeboard')) {
            $rows = DB::table('noticeboard')->get();
            foreach ($rows as $row) {
                $title = $row->notice_title ?? null;
                $notice = $row->notice ?? null;
                $newTitle = ($title && stripos($title, 'ekattor') !== false)
                    ? str_ireplace(array_keys($replace), array_values($replace), $title) : $title;
                $newNotice = ($notice && stripos($notice, 'ekattor') !== false)
                    ? str_ireplace(array_keys($replace), array_values($replace), $notice) : $notice;
                if ($newTitle !== $title || $newNotice !== $notice) {
                    DB::table('noticeboard')->where('id', $row->id)->update([
                        'notice_title' => $newTitle,
                        'notice' => $newNotice,
                    ]);
                }
            }
        }
    }

    public function down()
    {
        // Optional: reverse replace not implemented
    }
};
