<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('url')->nullable();
            $table->text('alt')->nullable();
            $table->text('image')->nullable();
            $table->integer('flag')->dafault(0);
            $table->integer('status')->dafault(1);
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
        Schema::dropIfExists('footer_banners');
    }
}
