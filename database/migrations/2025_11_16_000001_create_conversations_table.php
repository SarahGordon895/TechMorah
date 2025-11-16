<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique();
            $table->enum('channel', ['web', 'sms', 'whatsapp', 'call']);
            $table->string('phone_number')->nullable();
            $table->foreignId('contact_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['active', 'resolved', 'archived'])->default('active');
            $table->json('metadata')->nullable();
            $table->timestamps();
            
            $table->index(['channel', 'status']);
            $table->index('phone_number');
            $table->index('session_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
};
