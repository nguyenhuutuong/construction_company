<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_type_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_type_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);

            // Detailed Information
            $table->string('investor')->nullable(); // Chủ đầu tư
            $table->string('project_type')->nullable(); // Loại hình
            $table->string('land_area')->nullable(); // Diện tích khu đất
            $table->string('construction_area')->nullable(); // Diện tích xây dựng
            $table->string('floors')->nullable(); // Số tầng
            $table->text('features')->nullable(); // Công năng
            $table->string('address')->nullable(); // Địa chỉ
            $table->string('contract_type')->nullable(); // Hợp đồng
            $table->integer('year')->nullable(); // Năm thực hiện

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_type_details');
    }
};
