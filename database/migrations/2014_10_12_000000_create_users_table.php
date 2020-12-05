<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->unique();
            $table->integer('role')->default(4);
            $table->text('quotes')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
//            $table->unsignedBigInteger('regular_jobseeker_id');
//            $table->unsignedBigInteger('premium_jobseeker_id');
//            $table->unsignedBigInteger('admin_id');
//            $table->unsignedBigInteger('tester_id');
            $table->timestamps();
//            $table->foreign('regular_jobseeker_id')
//                ->references('id')
//                ->on('regular_jobseekers')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreign('premium_jobseeker_id')
//                ->references('id')
//                ->on('premium_jobseekers')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreign('admin_id')
//                ->references('id')
//                ->on('admins')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->foreign('tester_id')
//                ->references('id')
//                ->on('testers')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
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
