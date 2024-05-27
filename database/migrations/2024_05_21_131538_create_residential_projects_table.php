<?php

// database/migrations/create_residential_projects_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('residential_projects', function (Blueprint $table) {
            $table->id('residentialPID');
            $table->string('projectID')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('residential_projects');
    }
}
