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
        Schema::create('fuel_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type')->default("fuel");
            $table->string('car_type');
            $table->string('city');
            $table->decimal('lag',8,6);
            $table->decimal('lat', 9,6);
            $table->decimal('b80',4,2)->nullable();
            $table->decimal('b92',4,2)->nullable();
            $table->decimal('b95',4,2)->nullable();
            $table->integer('electricity')->default(0);
            $table->integer('status')->default(0);
            $table->integer('driver_id')->nullable();
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
        Schema::dropIfExists('fuel_orders');
    }
};
