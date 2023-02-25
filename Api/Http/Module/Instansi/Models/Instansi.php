<?php

namespace Api\Http\Module\Instansi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/*
|--------------------------------------------------------------------------
| CLASS TAMBAHAN
*/
use App\Service\Traits\ManagementModel;
use Api\Http\Module\Instansi\Scema\init;
/*
| end 
|--------------------------------------------------------------------------
*/

class Instansi extends Model
{
    use HasFactory;
    use ManagementModel;

    use SoftDeletes;
    public function __construct(array $attributes = [])
    {
        /*
        |--------------------------------------------------------------------------
        | INSTANCE MODEL GENERATE
        */

        $control = init::InitScema();
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

        Model::__construct($attributes);
    }
}
