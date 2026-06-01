<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('client_contents', function (Blueprint $table) {
            if (!Schema::hasColumn('client_contents', 'display_date')) {
                $table->string('display_date')->nullable()->after('publish_date');
            }
            if (!Schema::hasColumn('client_contents', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('comments');
            }
        });
    }

    public function down(): void
    {
        Schema::table('client_contents', function (Blueprint $table) {
            if (Schema::hasColumn('client_contents', 'display_date')) {
                $table->dropColumn('display_date');
            }
            if (Schema::hasColumn('client_contents', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};
