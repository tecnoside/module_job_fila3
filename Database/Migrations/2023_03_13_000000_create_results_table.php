<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateResultsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
<<<<<<< HEAD
            function (Blueprint $table): void {
=======
            function (Blueprint $table) : void {
>>>>>>> 090be5b (first)
                $table->increments('id');
                $table->unsignedInteger('task_id');
                $table->timestamp('ran_at')->useCurrent();
                $table->decimal('duration', 24, 14)->default(0.0);
                $table->longText('result');
                // $table->index('task_id', 'task_results_task_id_idx');
                // $table->index('ran_at', 'task_results_ran_at_idx');
                // $table->foreign('task_id', 'task_id_fk')
                //     ->references('id')
                //     ->on(TOTEM_TABLE_PREFIX.'tasks')
                //     ;
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
<<<<<<< HEAD
            function (Blueprint $table): void {
=======
            function (Blueprint $table) : void {
>>>>>>> 090be5b (first)
                // if (! $this->hasColumn('created_by')) {
                //     $table->string('created_by')->nullable();
                //     $table->string('updated_by')->nullable();
                // }
            }
        );
    }
}
