<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tobuys', function (Blueprint $table) {
            $table->id();
            $table->string('tobuy', 50);
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->date('deadline');
            $table->string('memo', 200)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tobuys');
    }
};
