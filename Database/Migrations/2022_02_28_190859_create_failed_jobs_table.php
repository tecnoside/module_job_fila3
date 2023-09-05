<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

final class CreateFailedJobsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $blueprint) : void {
                $blueprint->id();
                $blueprint->string('uuid')->unique();
                $blueprint->text('connection');
                $blueprint->text('queue');
                $blueprint->longText('payload');
                $blueprint->longText('exception');
                $blueprint->timestamp('failed_at')->useCurrent();
            }
        );
    }
}
