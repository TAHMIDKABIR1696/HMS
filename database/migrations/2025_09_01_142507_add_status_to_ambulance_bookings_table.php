<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ambulance_bookings', function (Blueprint $table) {
            $table->string('status')->default('pending'); // or enum if you want fixed values
        });
    }

    public function down()
    {
        Schema::table('ambulance_bookings', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
