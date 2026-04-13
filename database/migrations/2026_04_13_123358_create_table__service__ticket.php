<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Service_Ticket', function (Blueprint $table) {
            $table->id();
            $table->date("date_wo");
            $table->string("branch");
            $table->string("no_wo_client");
            $table->string("type_wo");
            $table->string("client");
            $table->smallInteger("is_active")->default(1);
            $table->string("teknisi");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table__service__ticket');
    }
};
