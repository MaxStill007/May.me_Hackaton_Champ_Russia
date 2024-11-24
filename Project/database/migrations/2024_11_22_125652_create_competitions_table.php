<?php

use App\Models\Age;
use App\Models\Category;
use App\Models\Discipline;
use App\Models\Location;
use App\Models\ParticipantsNumber;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Age::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('location');
            $table->smallInteger('participants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
