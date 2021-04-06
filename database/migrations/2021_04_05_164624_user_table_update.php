<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            
            $table->after('id', function ($table) {
                $table->string('lastname');
                $table->string('firstname');
            });

            $table->after('email_verified_at', function ($table) {
                $table->string('phone_number');
                $table->string('date_of_birth');
                $table->string('status')->nullable();
                $table->integer('is_admin')->nullable();
            });
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
}
