<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('transaction', function (Blueprint $table) {
            $table->id('trans_id');
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->string('trans_code', 5);
            $table->foreign('trans_code')->references('trans_code')->on('mst_transtype');
            $table->dateTime('trans_date');
            $table->longText('description')->nullable();
            $table->string('ref_id', 15)->unique();
            $table->decimal('current', 26, 10);
            $table->decimal('nominal', 26, 10);
            $table->decimal('balance', 26, 10);
            $table->longText('file_attachement')->nullable();
            $table->index('trans_id');
            $table->index('ref_id');
            $table->timestamp('created_at', 0)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at', 0)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
