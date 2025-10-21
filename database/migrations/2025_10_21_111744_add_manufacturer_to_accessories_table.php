<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('accessories', function (Blueprint $table) {
            // This is the line that actually adds the column to the database
            $table->string('manufacturer')->after('name'); 
        });
    }

    public function down()
    {
        Schema::table('accessories', function (Blueprint $table) {
            $table->dropColumn('manufacturer');
        });
    }
};
