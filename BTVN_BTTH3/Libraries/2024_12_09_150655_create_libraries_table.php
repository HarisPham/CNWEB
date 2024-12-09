<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('libraries', function (Blueprint $table) {
        $table->id(); // Mã thư viện
        $table->string('name'); // Tên thư viện
        $table->string('address'); // Địa chỉ
        $table->string('contact_number'); // Số điện thoại
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('libraries');
}

};
