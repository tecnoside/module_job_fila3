<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateFrequenciesTable extends XotBaseMigration
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
                $blueprint->unsignedInteger('task_id');
                $blueprint->string('label');
                $blueprint->string('interval');
                // $table->index('task_id', 'task_frequencies_task_id_idx');
                // $table->foreign('task_id', 'task_frequencies_task_id_fk')
                //     ->references('id')
                //     ->on(TOTEM_TABLE_PREFIX.'tasks');
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
