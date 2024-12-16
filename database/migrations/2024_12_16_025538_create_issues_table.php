<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    Schema::create('issues', function (Blueprint $table) {
        $table->id();
        $table->foreignId('computer_id')->constrained('computers');
        $table->string('reported_by', 50);
        $table->dateTime('reported_date');
        $table->text('description');
        $table->enum('urgency', ['Low', 'Medium', 'High']);
        $table->enum('status', ['Open', 'In Progress', 'Resolved']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};