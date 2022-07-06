<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->dateTime('online_at')->nullable();
            $table->dateTime('offline_at')->nullable();
            $table->decimal('amount', $precision = 10, $scale = 2);
            $table->string('currency', 3);
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->foreignIdFor(Category::class)->index('category_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
