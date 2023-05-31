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
        Schema::connection(config('briofy-filesystem.attachments.db_connection'))
            ->create('attachmentables', function (Blueprint $table) {
                $table->uuid('attachment_id');
                $table->uuidMorphs('attachmentable');
                $table->string('attachmentable_field');
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
        Schema::connection(config('briofy-filesystem.attachments.db_connection'))->dropIfExists('attachmentables');
    }
};
