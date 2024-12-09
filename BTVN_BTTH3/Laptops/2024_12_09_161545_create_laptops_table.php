<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('brand')->nullable(false); // Hãng sản xuất
            $table->string('model'); // Mẫu laptop
            $table->string('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status')->default(false); // Trạng thái cho thuê
            $table->foreignId('renter_id')->nullable()->constrained('renters')->onDelete('cascade'); // Khóa ngoại
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}

