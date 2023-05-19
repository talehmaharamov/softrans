<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('director_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('director_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('name');
            $table->longText('description');
            $table->longText('about');
            $table->unique(['director_id', 'locale']);
            $table->foreign('director_id')
                ->references('id')
                ->on('directors')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('director_translations');
    }
};
