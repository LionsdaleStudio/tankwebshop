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
        Schema::create('tanks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("crewnumber");
            $table->string("country");
            $table->string("wars");
            $table->integer("releaseyear");
            $table->double("cost");
            $table->longText("description");
            $table->boolean("active")->default(false);
            $table->timestamps(); //created_at és updated_at
            $table->softDeletes(); //deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanks');
    }
};
