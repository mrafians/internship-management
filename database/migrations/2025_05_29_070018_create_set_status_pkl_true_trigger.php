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
            CREATE TRIGGER set_status_pkl_true
            AFTER INSERT ON internships
            FOR EACH ROW
            BEGIN
                UPDATE students
                SET status_pkl = 1
                WHERE students.id = NEW.siswa_id;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS set_status_pkl_true");
    }
};
