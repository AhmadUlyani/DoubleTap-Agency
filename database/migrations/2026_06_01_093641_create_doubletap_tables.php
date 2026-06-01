<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_packages', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('name');
            $table->integer('price');
            $table->string('period')->default('/ bulan');
            $table->text('description')->nullable();
            $table->boolean('is_highlight')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('package_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_package_id')->constrained()->cascadeOnDelete();
            $table->string('feature');
            $table->boolean('is_included')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('theme')->nullable();
            $table->string('type');
            $table->string('title');
            $table->text('description');
            $table->string('likes')->nullable();
            $table->string('reach')->nullable();
            $table->json('tags')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business');
            $table->text('message');
            $table->string('package_name');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('company_values', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('role');
            $table->string('focus');
            $table->text('description');
            $table->json('skills')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('process_steps', function (Blueprint $table) {
            $table->id();
            $table->string('step_number');
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('name');
            $table->string('category');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('business_name');
            $table->string('sector');
            $table->string('package');
            $table->string('instagram')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('business_type');
            $table->foreignId('service_package_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('client_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('icon')->nullable();
            $table->string('label');
            $table->string('value');
            $table->string('trend')->nullable();
            $table->string('trend_type')->default('up');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('client_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->date('publish_date');
            $table->string('title');
            $table->string('type');
            $table->string('reach');
            $table->string('likes');
            $table->string('comments')->nullable();
            $table->timestamps();
        });

        Schema::create('client_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('client_recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->text('recommendation');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_recommendations');
        Schema::dropIfExists('client_insights');
        Schema::dropIfExists('client_contents');
        Schema::dropIfExists('client_stats');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('tools');
        Schema::dropIfExists('process_steps');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('company_values');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('package_features');
        Schema::dropIfExists('service_packages');
    }
};