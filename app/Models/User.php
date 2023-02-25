<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;
/*
|--------------------------------------------------------------------------
| CLASS TAMBAHAN
*/
use App\Service\Kernel\Controller;
use App\Service\Traits\ManagementModel;
use Api\Http\Module\Instansi\Scema\init;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
| end 
|--------------------------------------------------------------------------
*/

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use ManagementModel;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    use SoftDeletes;
    public function __construct(array $attributes = [])
    {
        /*
        |--------------------------------------------------------------------------
        | INSTANCE MODEL GENERATE
        */

        $control = new Controller(\Scema\Users::class);
        /*
        | end 
        |--------------------------------------------------------------------------
        */
        /*
        |--------------------------------------------------------------------------
        | SETTER DATA MODEL
        */
        $this->fillable = array_merge($control->getFild());
        $this->table = $control->model->table;
        $this->primaryKey = $control->model->primary;
        /*
        | end
        |--------------------------------------------------------------------------

        /*
        |--------------------------------------------------------------------------
        | CREATE PROTECTED MODEL
        */
        if (!empty($control->model->protected)) {
            foreach ($control->model->protected as $name_protect => $protect) {
                $this->{$name_protect} = $protect;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE RELATION FUNCTION
        */
        $this->initial_function_relationship($this, $control);
        $this->initial_function_relationship_trashed($this, $control);
        /*
        | end
        |--------------------------------------------------------------------------
        */

        parent::__construct($attributes);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
