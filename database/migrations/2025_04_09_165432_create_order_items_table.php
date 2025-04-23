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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
        
            // ✅ ici on ajoute d'abord nullable, puis la contrainte
            $table->foreignId('item_id')->nullable();
            $table->string('name');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        
            // 💡 on applique la contrainte APRES avoir défini la colonne
            $table->foreign('item_id')->references('id')->on('items')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
