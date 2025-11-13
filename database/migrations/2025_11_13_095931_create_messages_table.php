<?php

use Illuminate\Database\Migrations\Migration;

// Duplicate messages migration. Converted to no-op to preserve history while
// avoiding duplicate creation; `support_tables` provides the real schema.

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
