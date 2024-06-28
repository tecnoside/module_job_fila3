<?php

<<<<<<< HEAD
declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
=======
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
>>>>>>> 21140ac (first)
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateExportsTable extends XotBaseMigration
{
<<<<<<< HEAD
    /**
=======
     /**
>>>>>>> 21140ac (first)
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->timestamp('completed_at')->nullable();
                $table->string('file_disk');
                $table->string('file_name')->nullable();
                $table->string('exporter');
                $table->unsignedInteger('processed_rows')->default(0);
                $table->unsignedInteger('total_rows');
                $table->unsignedInteger('successful_rows')->default(0);
<<<<<<< HEAD
                // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('user_id', 36)->nullable()->index();
                // $table->timestamps();
=======
                //$table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('user_id',36)->nullable()->index();
                //$table->timestamps();
>>>>>>> 21140ac (first)
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
<<<<<<< HEAD
                $this->updateTimestamps($table, true);
            }
        );
    }
}
=======
                $this->updateTimestamps($table,true);
            }
        );
    }

   
};
>>>>>>> 21140ac (first)
