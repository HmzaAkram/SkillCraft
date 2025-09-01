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
    Schema::table('notes', function (Blueprint $table) {
        // Drop problematic columns if they exist
        if (Schema::hasColumn('notes', 'asset/notes/')) {
            $table->dropColumn('asset/notes/');
        }
        if (Schema::hasColumn('notes', 'description')) {
            $table->dropColumn('description');
        }
        
        // Add correct columns if they don't exist
        if (!Schema::hasColumn('notes', 'content')) {
            $table->text('content')->nullable()->after('title');
        }
        if (!Schema::hasColumn('notes', 'file_path')) {
            $table->string('file_path')->nullable()->after('content');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
