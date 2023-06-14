<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winch_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
           /*  $table->foreignId('service_id')->constrained()->onDelete('cascade'); */
            $table->string('car_type');
            $table->string('city_from');
            $table->string('city_to');
            $table->decimal('lag_from',8,6);
            $table->decimal('lat_from', 9,6);
            $table->decimal('lag_to',8,6);
            $table->decimal('lat_to', 9,6);
            $table->integer('driver_id')->nullable();
            $table->integer('status')->default(0);
            $table->text('description')->nullable();
            $table->integer('isdelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winch_orders');
    }
};
