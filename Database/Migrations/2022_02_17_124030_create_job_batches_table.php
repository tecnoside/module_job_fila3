<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateJobBatchesTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint): void {
                $blueprint->string('id')->primary();
                $blueprint->string('name');
                $blueprint->integer('total_jobs');
                $blueprint->integer('pending_jobs');
                $blueprint->integer('failed_jobs');
                $blueprint->text('failed_job_ids');
                $blueprint->mediumText('options')->nullable();
                $blueprint->integer('cancelled_at')->nullable();
                $blueprint->integer('created_at');
                $blueprint->integer('finished_at')->nullable();
            }
        );
    }
}
