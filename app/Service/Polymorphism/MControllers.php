<?php

namespace App\Service\Polymorphism;

use Illuminate\Http\Request;
// membuat interface Tanah
interface MControllers
{
    public function store(Request $request);
    public function update(Request $request, $id);
    public function destroy($id);
    public function get();
}
