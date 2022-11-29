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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('Имя');
            $table->string('last_name')->comment('Фамилия');;
            $table->string('patronymic')->nullable()->comment('Отчество');
            $table->string('organisation')->nullable()->comment('Организация');
            $table->integer('ls')->nullable()->comment('Лицевой счет');
            $table->string('address')->comment('Адрес');
            $table->string('phone', 20)->comment('Номер телефона');
            $table->string('email')->comment('Email');
            $table->string('title')->comment('Тема');
            $table->text('message')->comment('Обращение');
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
        Schema::dropIfExists('tickets');
    }
};
