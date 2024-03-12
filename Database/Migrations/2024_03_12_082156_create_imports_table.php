<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateImportsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->timestamp('completed_at')->nullable();
                $table->string('file_name');
                $table->string('file_path');
                $table->string('importer');
                $table->unsignedInteger('processed_rows')->default(0);
                $table->unsignedInteger('total_rows');
                $table->unsignedInteger('successful_rows')->default(0);
                //$table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('user_id',36)->nullable()->index();
                $table->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                /*
                if (! $this->hasColumn('created_by')) {
                    $table->string('created_by')->nullable();
                    $table->string('updated_by')->nullable();
                }
                */
                $this->updateTimestamps($table,true);
            }
        );
    }
    

   
};
