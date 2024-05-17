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

        if (!Schema::hasColumns('contact_requests', ['to', 'subject', 'success_message', 'privacy_disclaimer'])) {

            Schema::table('contact_requests', function (Blueprint $table) {
                //
                $table->string('to')->nullable()->after('id');
                $table->text('subject')->nullable()->after('to');
                $table->text('success_message')->nullable()->after('subject');
                $table->text('privacy_disclaimer')->nullable()->after('success_message');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_requests', function (Blueprint $table) {
            //
        });
    }
};
