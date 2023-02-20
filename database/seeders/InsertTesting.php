<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Service\Kernel\Controller;

class InsertTesting extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $req = new \Illuminate\Http\Request();
        $req->replace([
            "name" => "ego",
            'email' => "egookt301097@gmail.com",
            'password' => "password"
        ]);
        /**
         * INSERT FUNCTION
         */
        $control = new Controller(\Scema\Instansi::class);
        $control->initRouter("api");


        $control->insert($req);
        if (!$res = $control->getResult())
            dd($res);
        $control->users_role($res->users, ["api", "admin"]);
        $control->getResult();
    }
}
