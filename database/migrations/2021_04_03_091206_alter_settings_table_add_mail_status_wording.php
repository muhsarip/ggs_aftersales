<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSettingsTableAddMailStatusWording extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->text("mail_text_status_1")->nullable();
            $table->text("mail_text_status_2")->nullable();
            $table->text("mail_text_status_3")->nullable();
            $table->text("mail_text_status_4")->nullable();
            $table->text("mail_text_status_5")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                "mail_text_status_1",
                "mail_text_status_2",
                "mail_text_status_3",
                "mail_text_status_4",
                "mail_text_status_5",
            ]);
        });
    }
}
