<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string("service_id",255)->nullable();
            $table->string("name",255)->nullable();
            $table->string("address",255)->nullable();
            $table->string("phone",255)->nullable();
            $table->string("email",255)->nullable();
            $table->string("tipe_barang",255)->nullable();
            $table->text("detail_kerusakan")->nullable();
            $table->string("serial_number",255)->nullable();
            
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
        Schema::dropIfExists('services');
    }
}
