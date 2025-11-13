<?php

use Illuminate\Database\Migrations\Migration;

// Duplicate products migration. Left as no-op to avoid recreating the table
// since support_tables migration already defines products schema.

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
