<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('content');
            $table->float('price');

            /**
             * создаём поле внешнего ключа FOREIGN_ID
             * 
             * foreignId() - создаёт поле внешнего ключа c именем 'user_id' для связи с другой таблицей и возвращает её объект
             * 
             * constrained() - извлекает из имени user_id имя связываемой таблицы 'users' и её ключевое поле 'id'
             * 
             * onDelete() - указывает, что делать во вторичной таблице при удалении записей из первичной.
             *   здесь 'cascade' указывает на каскадное удаление
             */
            $table->foreignId('user_id')->constrained()
                ->onDelete('cascade');
            
            // создаются поля created_at и modified_at
            $table->timestamps();

            $table->index('created_ad'); // создаём индекс по полю для ускорения сортировки по нему
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbs');
    }
}
