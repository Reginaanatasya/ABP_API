<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPresensiTable extends Migration
{
    public function up()
    {
        // Drop the existing foto_in column if it exists
        if (Schema::hasColumn('presensi', 'foto_in')) {
            Schema::table('presensi', function (Blueprint $table) {
                $table->dropColumn('foto_in');
            });
        }

        // Add the foto_in column with the desired attributes
        Schema::table('presensi', function (Blueprint $table) {
            $table->string('foto_in')->nullable()->default('');
        });
    }

    public function down()
    {
        // Revert the changes if necessary
        if (Schema::hasColumn('presensi', 'foto_in')) {
            Schema::table('presensi', function (Blueprint $table) {
                $table->dropColumn('foto_in');
            });
        }
    }
}

