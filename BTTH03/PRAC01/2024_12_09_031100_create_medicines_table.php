<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // Mã thuốc
            $table->string('name', 255)->nullable(); // Tên thuốc
            $table->string('brand', 100)->nullable(); // Thương hiệu (tùy chọn)
            $table->string('dosage', 50)->nullable(); // Liều lượng
            $table->string('form', 50); // Dạng thuốc
            $table->decimal('price', 10, 2); // Giá
            $table->integer('stock'); // Số lượng tồn
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
?>