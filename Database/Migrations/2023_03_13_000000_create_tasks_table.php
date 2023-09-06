<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateTasksTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint): void {
                $blueprint->increments('id');
                $blueprint->string('description');
                $blueprint->string('command');
                $blueprint->string('parameters')->nullable();
                $blueprint->string('expression')->nullable();
                $blueprint->string('timezone')->default('UTC');
                $blueprint->boolean('is_active')->default(true);
                $blueprint->boolean('dont_overlap')->default(false);
                $blueprint->boolean('run_in_maintenance')->default(false);
                $blueprint->string('notification_email_address')->nullable();
                $blueprint->string('notification_phone_number')->nullable();
                $blueprint->string('notification_slack_webhook');
                $blueprint->integer('auto_cleanup_num')->default(0);
                $blueprint->string('auto_cleanup_type', 20)->nullable();
                $blueprint->boolean('run_on_one_server')->default(false);
                $blueprint->index('is_active', 'tasks_is_active_idx');
                $blueprint->index('dont_overlap', 'tasks_dont_overlap_idx');
                $blueprint->index('run_in_maintenance', 'tasks_run_in_maintenance_idx');
                $blueprint->index('run_on_one_server', 'tasks_run_on_one_server_idx');
                $blueprint->index('auto_cleanup_num', 'tasks_auto_cleanup_num_idx');
                $blueprint->index('auto_cleanup_type', 'tasks_auto_cleanup_type_idx');
                $blueprint->boolean('run_in_background')->default(false);
                $blueprint->string('created_by')->nullable();
                $blueprint->string('updated_by')->nullable();
                $blueprint->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            static function (Blueprint $blueprint): void {
                // if (! $this->hasColumn('created_by')) {
                //     $table->string('created_by')->nullable();
                //     $table->string('updated_by')->nullable();
                // }
            }
        );
    }
}
