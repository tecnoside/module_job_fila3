<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateParametersTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) : void {
                $table->increments('id');
                $table->unsignedInteger('frequency_id');
                $table->string('name');
                $table->string('value');
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
                $table->timestamps();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) : void {
                // if (! $this->hasColumn('created_by')) {
                //     $table->string('created_by')->nullable();
                //     $table->string('updated_by')->nullable();
                // }
            }
        );
    }
}
