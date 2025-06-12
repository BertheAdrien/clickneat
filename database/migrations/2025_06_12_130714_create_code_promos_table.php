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
        Schema::create('codePromo', function (Blueprint $table) {
            $table->string('code')->primary();  
            $table->unsignedBigInteger('id_resto'); 
    
            $table->decimal('montant', 10, 2)->nullable(); 
            $table->unsignedTinyInteger('pourcentage')->nullable(); 
    
            $table->date('date_debut');
            $table->date('date_fin');
    
            $table->timestamps();
    
            $table->foreign('id_resto')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codePromo');
    }
};
