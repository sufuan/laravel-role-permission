<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Define your additional fields here
            $table->string('phone');
            $table->string('usertype')->nullable();
            $table->string('session')->nullable();
            $table->string('department')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('class_roll')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('image')->nullable();
            $table->text('skills')->nullable();
            $table->string('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback the changes made in the 'up' method
            $table->dropColumn('phone');
            $table->dropColumn('usertype');
            $table->dropColumn('session');
            $table->dropColumn('department');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('blood_group');
            $table->dropColumn('class_roll');
            $table->dropColumn('father_name');
            $table->dropColumn('mother_name');
            $table->dropColumn('current_address');
            $table->dropColumn('permanent_address');
            $table->dropColumn('image');
            $table->dropColumn('skills');
            $table->dropColumn('transaction_id');
        });
    }
}
