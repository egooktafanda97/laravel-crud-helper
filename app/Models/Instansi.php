<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
/*
|--------------------------------------------------------------------------
| CLASS TAMBAHAN
*/

use App\Service\Kernel\Controller;
use App\Service\Traits\ManagementModel;
/*
| end 
|--------------------------------------------------------------------------
*/

class Instansi extends Model
{
    use HasFactory;
    use ManagementModel;

    // use SoftDeletes;
    public function __construct(array $attributes = [])
    {
        /*
        |--------------------------------------------------------------------------
        | INSTANCE MODEL GENERATE
        */
        $control = new Controller(\Scema\Instansi::class);
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
        // if ($instace->created_protected()) {
        //     foreach ($instace->created_protected() as $name_protect => $protect) {
        //         $this->{$name_protect} = $protect;
        //     }
        // }

        /*
        |--------------------------------------------------------------------------
        | CREATE RELATION FUNCTION
        */
        $this->initial_function_relationship($this, $control);
        /*
        | end
        |--------------------------------------------------------------------------
        */

        Model::__construct($attributes);
    }
}
