<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIntoInfoPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_payments', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('country_of_passport')->nullable();
            $table->string('phone_code')->nullable();
            $table->integer('type')->nullable();  // đăng ký visa từ ứng dụng nào
            $table->text('return_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_payments', function (Blueprint $table) {
            //
        });
    }
}
