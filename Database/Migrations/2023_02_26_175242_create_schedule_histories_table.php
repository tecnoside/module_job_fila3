<?php

use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\Config;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateScheduleHistoriesTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->string('command');
            $table->text('params')->nullable();
            $table->text('output');
            $table->text('options')->nullable();
            $table->timestamps();
            /*
            $table->foreign('schedule_id')
                ->references('id')
                ->on(Config::get('filament-database-schedule.table.schedules', 'schedules'));
            */
            $table->integer('schedule_id')->nullable();
            }
        );
         // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('created_by')) {
                //     $table->string('created_by')->nullable();
                //     $table->string('updated_by')->nullable();
                // }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );

    }

    
}
