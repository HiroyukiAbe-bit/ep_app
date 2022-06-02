<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParamParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('line_id');
            $table->dropColumn('how_to_watch_id');
            $table->string('prefecture')->after('last_name');
            $table->string('address')->after('prefecture');
            $table->string('tel')->after('address');
            $table->string('allergy')->nullable()->after('tel');
            $table->string('other_allergy')->nullable()->after('allergy');
            $table->boolean('attendance')->after('other_allergy');
            $table->boolean('guest_type')->after('attendance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
