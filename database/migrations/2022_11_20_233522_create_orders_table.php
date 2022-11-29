<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('Имя');
            $table->string('last_name')->comment('Фамилия');;
            $table->string('patronymic')->nullable()->comment('Отчество');
            $table->string('organisation')->nullable()->comment('Организация');
            $table->string('address')->comment('Адрес');
            $table->string('phone', 20)->comment('Номер телефона');
            $table->string('email')->unique()->comment('Email');
            $table->BigInteger('service_id')->unsigned()->comment('Услуга');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict')->onUpdate('cascade');;
            $table->text('message')->nullable()->comment('Обращение');
            $table->BigInteger('status_id')->unsigned()->comment('Статус');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
