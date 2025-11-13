<?php

use Illuminate\Database\Migrations\Migration;

// Duplicate contacts migration. Turned into no-op to keep migration history
// without re-creating the table (created instead by support_tables).

return new class extends Migration
{
    public function up(): void
    {
        // no-op (duplicate)
    }

    public function down(): void
    {
        // no-op (duplicate)
    }
};
