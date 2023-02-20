<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// *********************
use App\Service\Kernel\Controller;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $migrate = new Controller(\Scema\Users::class);
        Schema::create(strtoupper(from_camel_case($migrate->model->table)), function (Blueprint $table) use ($migrate) {
            $migrate->migration($table);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            if ($migrate->getSoftDeletesStatus())
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(strtoupper('users'));
    }
}
