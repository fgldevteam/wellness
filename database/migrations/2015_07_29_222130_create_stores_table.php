<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->string('store_number',11)->unique;
            $table->integer('banner_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->integer('classification_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('name',255);
            $table->string('address1', 255);
            $table->string('city', 255);
            $table->string('province', 255);
            $table->string('postal_code', 255);
            $table->double('lat', 9,6);
            $table->double('long', 9,6);
            $table->double('sqft');
            $table->boolean('mall_entrance');
            $table->integer('entrances');
            $table->integer('cashbanks');
            $table->integer('floors');
            $table->integer('registers');
            $table->integer('pdts');
            $table->integer('tablets');
            $table->string('last_reno', 10);
            $table->string('last_computer_update', 10);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
