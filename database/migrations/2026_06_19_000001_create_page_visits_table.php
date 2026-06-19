<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('path')->nullable();

            $table->string('method', 10);

            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();

            $table->text('referer')->nullable();

            $table->string('session_id')->nullable();

            $table->timestamp('visited_at')->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
