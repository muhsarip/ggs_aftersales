<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();

            $table->string("status",255)->nullable();
            $table->string("rma_id",255)->nullable();
            $table->integer("distributor_id")->nullable();
            $table->string("case_id",255)->nullable();
            $table->string("name",255)->nullable();
            $table->text("address")->nullable();
            $table->string("phone",255)->nullable();
            $table->string("email",255)->nullable();
            $table->string("merk_barang",255)->nullable();
            $table->string("nama_barang",255)->nullable();
            $table->string("serial_number",255)->nullable();
            $table->text("detail_kerusakan")->nullable();
            $table->string("foto_barang_1",255)->nullable();
            $table->string("foto_barang_2",255)->nullable();
            $table->string("foto_serial_number",255)->nullable();

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
        Schema::dropIfExists('warranties');
    }
}
