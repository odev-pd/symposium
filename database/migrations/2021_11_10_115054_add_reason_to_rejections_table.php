<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonToRejectionsTable extends Migration
{
    public function up()
    {
        Schema::table('rejections', function (Blueprint $table) {
            $table->string('reason')->nullable();
        });
    }

    public function down()
    {
        Schema::table('rejections', function (Blueprint $table) {
            $table->removeColumn('reason');
        });
    }
}
