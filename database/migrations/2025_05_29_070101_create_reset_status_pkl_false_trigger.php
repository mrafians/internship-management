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
        DB::unprepared("
            CREATE TRIGGER reset_status_pkl_false
            AFTER DELETE ON internships
            FOR EACH ROW
            BEGIN
                UPDATE students
                SET status_pkl = 0
                WHERE students.id = OLD.siswa_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS reset_status_pkl_false");
    }
};
