<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tasks', function (Blueprint $table) {
            $table->increments('id_task');
            $table->integer('id_user');
            $table->string('nama_task');
            $table->text('deskripsi');
            $table->date('tanggal_deadline');
            $table->time('waktu_deadline');
            $table->enum('repeat',['true','false']);
            $table->integer('repeat_number');
            $table->enum('repeat_type',['menit', 'jam', 'harian', 'mingguan', 'bulanan']);
            $table->enum('active',['true','false']);
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
        Schema::dropIfExists('tb_tasks');
    }
}
