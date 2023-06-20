<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone',11)->unique();
            $table->string('avatar')->default("https://img.freepik.com/free-icon/user_318-644324.jpg?size=626&ext=jpg&ga=GA1.2.1376264918.1675615774&semt=sph");
            $table->longText('bio')->nullable();
            $table->string('password');
            $table->json('roles_name')->default(new Expression('(JSON_ARRAY("user"))'));
            $table->string('Status', 10)->default("مفعل");
            $table->string('type')->default('service_provider');
            $table->string('driver_type')->nullable();
            $table->text('device_token')->nullable(); // Add device token in users migration file.
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
