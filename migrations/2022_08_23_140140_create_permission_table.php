<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Database\Migrations\Migration;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Schema\Schema;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->string('path');
            $table->string('method');
            $table->string('display_name');
            $table->timestamps();

            $table->unique(['path']);
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('display_name')->nullable();
            $table->timestamps();

            $table->unique(['name']);
        });

        Schema::create('casbin_rule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ptype');
            $table->string('v0');
            $table->string('v1');
            $table->string('v2');
            $table->string('v3')->nullable();
            $table->string('v4')->nullable();
            $table->string('v5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('casbin_rule');
    }
}
