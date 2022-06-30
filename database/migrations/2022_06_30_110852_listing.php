<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            //utf8mb4 - so that clients can add emojis to the listing description
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->string('uuid');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->dateTimeTz('online_at')->nullable();
            $table->dateTimeTz('offline_at');
            $table->decimal('amount', $precision = 10, $scale = 2);
            $table->string('currency', 3);
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->integer('category_id')->index('category_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};