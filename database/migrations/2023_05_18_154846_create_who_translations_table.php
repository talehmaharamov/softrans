<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('who_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('who_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('description');
            $table->unique(['who_id', 'locale']);
            $table->foreign('who_id')->references('id')->on('whos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('who_translations');
    }
};
