<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Service\Kernel\Controller;

class UpdateTesting extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        $req = new \Illuminate\Http\Request();

        $control = new Controller(\Scema\Instansi::class);
        $req->replace([
            "name" => "ego1",
            'email' => "egookt301097@gmail.com",
            'password' => "password"
        ]);
        $control->update($req, 1);
        if (!$res = $control->getResult())
            dd($res);
        // dd($control->getResult());
        // $control->deleted(1);
    }
}
