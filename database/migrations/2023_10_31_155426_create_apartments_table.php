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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table->string("title");
            $table->string("slug");
            $table->integer("rooms_number");
            $table->integer("beds_number");
            $table->integer("bathrooms_number");
            $table->integer("square_meters");
            $table->string("address");
            $table->decimal("latitude", 11, 8);
            $table->decimal("longitude", 11, 8);
            $table->text("thumbnail")->nullable();
            $table->boolean("visibility");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
