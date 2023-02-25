<?php

namespace Api\Http\Module\Auth\Model;

use App\Models\User as MUsers;

class User extends MUsers
{
    public function __construct()
    {
        parent::construct();
    }
}
