<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('work_edge')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_workshop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained('workshops')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->string('user_type');
            $table->boolean('assisted_to_workshop')->nullable();
            $table->boolean('sent')->nullable()->default(false);
            $table->timestamp('sent_at')->nullable();
            $table->boolean('paid')->nullable();
            $table->timestamp('paid_at')->nullable();

            $table->foreign(['user_id', 'user_type'])
                ->references(['id', 'type'])
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_workshop');
        Schema::dropIfExists('workshops');
    }
}
