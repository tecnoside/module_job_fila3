<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateJobsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint): void {
                $blueprint->bigIncrements('id');
                $blueprint->string('queue')->index();
                $blueprint->longText('payload');
                $blueprint->unsignedTinyInteger('attempts');
                $blueprint->unsignedInteger('reserved_at')->nullable();
                $blueprint->unsignedInteger('available_at');
                $blueprint->unsignedInteger('created_at');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $blueprint): void {
                if (! $this->hasColumn('created_by')) {
                    $blueprint->string('created_by')->nullable();
                    $blueprint->string('updated_by')->nullable();
                }

                if (! $this->hasColumn('updated_at')) {
                    $blueprint->timestamp('updated_at')->nullable();
                }

                if (! $this->hasColumn('created_at')) {
                    $blueprint->timestamp('created_at')->nullable();
                }
            }
        );
    }
}
