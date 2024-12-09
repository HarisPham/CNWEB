<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Khóa chính
            $table->unsignedBigInteger('medicine_id') // Khóa ngoại
                  ->constrained('medicines') // Tham chiếu tới bảng `medicines`
                  ->onDelete('cascade'); // Khi xóa thuốc, xóa luôn các bản ghi liên quan
            $table->integer('quantity'); // Số lượng bán
            $table->datetime('sale_date'); // Ngày giờ bán
            $table->string('customer_phone', 10)->nullable(); // Số điện thoại khách hàng
            $table->timestamps();

            $table->foreign('medicine_id')
                  ->references('medicine_id')
                  ->on('medicines')
                  ->onDelete('cascade'); 
        });

    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
?>

