<section class="main-section" id="started">
    <header>Init Scema</header>
    <article>
        <p>
            Membuat Skema baru
        </p>
        <pre>
            <code class="language-php">
namespace Model;


use App\Service\Classes\ModelActions;
use App\Service\Polymorphism\Scema;



class Instansi extends ModelActions implements Scema
{
/** nama model huruf kecil */
public $name = "..";
/** nama tabel database */
public $table = "instansi";
/** nama model eloquent */
public $model = "Instansi";
/*
|   NAMA CONTROLLER
*/
public $controller = "InstansiController";
/*
|   EMD NAMA CONTROLLER
*/
public $name_space = [];

public function __construct()
{
    parent::__construct();
}
/**
* @return  array NAMA FILD DATABASE
*/
public function fild(): array
{
    return [
            [
                ...
            ]
    ];
}
/*
|   EMD NAMA FILD
*/
/**
* @return  array INISIAL CONFIGURASI RELASI
*/
public function relation(): array
{
    return [
    ...
    ];
}
/*
|   EMD INISIAL CONFIGURASI RELASI
*/

/**
* @return  array INISIAL ROUTER API
*/
public function api_router(): array
{
    return   [
    ];
}
/*
|   EMD INISIAL ROUTER API
*/


}
            </code>
        </pre>
        {{-- <p>
            ...
        </p>
        <pre>
            <code class="nohighlight">GDScript is awesome!</code>
        </pre> --}}
    </article>
</section>
