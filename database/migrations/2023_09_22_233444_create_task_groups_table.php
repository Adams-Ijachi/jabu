<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('task_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_groups');
    }
};
