<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('portrait_photography',500);
            $table->string('passport_data_page_image',500);
            $table->string('full_name');
            $table->dateTime('birthday');
            $table->string('nationality');
            $table->string('nationality_at_birth');
            $table->tinyInteger('sex');
            $table->string('religion');
            $table->string('occupation');
            $table->string('permanent_residential_address',500);
            $table->string('phone');
            $table->string('email');
            $table->string('passport_number');
            $table->string('passport_type');
            $table->dateTime('expiry_date');
            $table->integer('intended_length_of_stay_in_vn');
            $table->dateTime('intended_date_of_entry');
            $table->string('purpose_of_entry');
            $table->string('city_province');
            $table->string('intended_temporaty_residential_address_in_vn',500);
            $table->string('name_hosting_organisation',500);
            $table->string('address',500);
            $table->text('children_14_years_old');
            $table->dateTime('grant_visa_valid_from');
            $table->dateTime('grant_visa_valid_to');
            $table->string('alowed_to_entry_throuth_checkpoint');
            $table->string('exit_throuth_checkpoint');
            $table->string('status');
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
        Schema::dropIfExists('info_payments');
    }
}
