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
            static function (Blueprint $blueprint): void {
                $blueprint->increments('id');
                $blueprint->unsignedInteger('frequency_id');
                $blueprint->string('name');
                $blueprint->string('value');
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
