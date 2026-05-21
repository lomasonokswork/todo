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
        Schema::create('to_dos', function (Blueprint $table) {
    $table->id();
    $table->foreignId("created_by")->nullable()->constrained("users")->nullOnDelete();
    $table->string("content");
    $table->enum("priority", ["low", "medium", "high"]);
    $table->boolean("completed");
    $table->timestamps();
});
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('to_dos');
    }
};
