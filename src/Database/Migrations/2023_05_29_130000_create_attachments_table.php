<?php

use Briofy\FileSystem\Enums\Type;
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
        Schema::create('attachments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->index();
            $table->string('disk');
            $table->string('path');
            $table->unsignedSmallInteger('type')->default(Type::IMAGE->value);
            $table->timestamps();
            $table->softDeletes();

            config('briofy-filesystem.attachments.user_id_type') == 'uuid'
                ? $table->uuid('user_id')->index()->after('id')
                : $table->unsignedBigInteger('user_id')->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};
