<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ambulance_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('phone');
            $table->string('pickup_area');
            $table->string('pickup_address');
            $table->string('drop_hospital');
            $table->string('ambulance_type');
            $table->decimal('distance_km', 8, 2)->nullable();
            $table->decimal('total_fee', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ambulance_bookings');
    }
};
