<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('status')->default(\App\Enums\TaskStatusEnum::CREATED->value);
            $table->integer('iteration_count');
            $table->text('description');

            $table->foreignId('task_group_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('task_frequency_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('start_date');
            $table->date('end_date');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
