<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// *********************
use App\Service\Kernel\Controller;

class Instansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $migrate = new Controller(\Scema\Instansi::class);
        Schema::create(strtoupper(from_camel_case('Instansi')), function (Blueprint $table) use ($migrate) {
            $migrate->migration($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(strtoupper('Instansi'));
    }
}
