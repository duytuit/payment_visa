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
            $table->string('portrait_photography',500)->nullable();
            $table->string('passport_data_page_image',500)->nullable();
            $table->string('full_name')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_at_birth')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('permanent_residential_address',500)->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_type')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->integer('intended_length_of_stay_in_vn')->nullable();
            $table->dateTime('intended_date_of_entry')->nullable();
            $table->string('purpose_of_entry')->nullable();
            $table->string('city_province')->nullable();
            $table->string('intended_temporaty_residential_address_in_vn',500)->nullable();
            $table->string('name_hosting_organisation',500)->nullable();
            $table->string('address',500)->nullable();
            $table->text('children_14_years_old')->nullable();
            $table->dateTime('grant_visa_valid_from')->nullable();
            $table->dateTime('grant_visa_valid_to')->nullable();
            $table->string('alowed_to_entry_throuth_checkpoint')->nullable();
            $table->string('exit_throuth_checkpoint')->nullable();
            $table->string('status')->nullable();
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
