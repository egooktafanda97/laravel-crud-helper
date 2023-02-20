<?php

namespace App\Service\Polymorphism;
// membuat interface Tanah
interface Scema
{
    public function fild(): array;
    public function relation(): array;
    public function api_router(): array;
}
