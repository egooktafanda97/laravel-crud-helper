<section class="main-section" id="migration">
    <header>TEMPLATE MIGRATION</header>
    <article>
        <p>
            beberapa template migrasi yang telah tersedia.
        </p>
        <pre><code class="language-php">
[
    /*0*/
    "primary" => [
        "type" => "unsignedBigInteger",
        "param" => "unsigned,index",
    ],
    /*1*/
    "str_200" => [
        "type" => "string",
        "size" => "200"
    ],
    /*2*/
    "str_null_20" => [
        "type" => "string",
        "size" => "20",
        "param" => "nullable"
    ],
    /*3*/
    "str_null_200" => [
        "type" => "string",
        "size" => "200",
        "param" => "nullable"
    ],
    /*4*/
    "time_null" => [
        "type" => "time",
        "param" => "nullable"
    ],
    /*5*/
    "str_uniq_200" => [
        "type" => "string",
        "size" => "100",
        "param" => "unique",
    ],
    /*6*/
    "date_null" => [
        "type" => "date",
        "param" => "nullable"
    ],
    /*7*/
    "f_key" => [
        "type" => "unsignedBigInteger",
    ],
    /*8*/
    "f_key_null" => [
        "type" => "unsignedBigInteger",
        "param" => "nullable"
    ],
    /*9*/
    "boll" => [
        "type" => "boolean",
        "param" => "default"
    ],
    /*10*/
    "text_null" => [
        "type" => "text",
        "param" => "nullable"
    ],
    /*11*/
    "str_null_200*0" => [
        "type" => "string",
        "size" => "100",
        "param" => "nullable,default|0",
    ],
    /*12*/
    "str_null_10" => [
        "type" => "string",
        "size" => "10",
        "param" => "nullable,default|0",
    ],
    /*13*/
    "big_int" => [
        "type" => "bigInteger",
    ],
    /*14*/
    "int*0" => [
        "type" => "integer",
        "param" => "default|0",
    ],
    /*15*/
    "longText_null" =>  [
        "type" => "longText",
        "param" => "nullable",
    ],
    /*16*/
    "int_null" => [
        "type" => "integer",
        "param" => "nullable",
    ],
    /*17*/
    "str_16" => [
        "type" => "string",
        "size" => "16"
    ],
    /*18*/
    "str_uniq_16" => [
        "type" => "string",
        "size" => "16",
        "param" => "unique",
    ],
    /*19*/
    "f_key_uniq" => [
        "type" => "unsignedBigInteger",
        "param" => "unique,unsigned,index",
    ],
    /*20*/
    "bool*1" => [
        "type" => "boolean",
        "param" => "default|1"
    ],
    /*21*/
    "str_uniq_null_16" => [
        "type" => "string",
        "size" => "16",
        "param" => "unique,nullable",
    ],
    /*22*/
    "date_time" => [
        "type" => "dateTime"
    ],
]</code></pre>
        <p>
            Cara menggunakan nya sederhana sekali, dengan memanggil kode berikut
        </p>
        <pre><code class="language-php">$this->Migration->getTemplate(.. key template ..)</code></pre>
        <p>
            Untuk membuat template baru dapat menggunakan
        </p>
        <pre><code class="language-php">$this->Migration->newTemplate('str_uniq_20')
/** 
* terdapat beberapa segment dalam pembuatan template migration baru 
* 1. function yaitu $table->(**function**)()
* 2. parameter yaitu $table->(**function**)(.. nama fild.. )->(**parameter**)
* 3. size ini adalah opsional yaitu $table->(**function**)(.. nama fild..,**size** )->(**parameter**)
*/
/* REFERENSI */
[
    "str"   => "string",
    "int" => "integer",
    "null" => "nullable",
    "uniq" => "unique",
    "bool" => "boolean"
]
</code></pre>
        <p>DAPAT JUGA MEMBUAT MIGRASI MANUAL DENGAN CARA </p>
        <pre><code class="language-php">
"migration" => [
    "type" => "string", // function required
    "size" => "16", // size opsional
    "param" => "unique", // parameter opsional
]
</code></pre>
        <p>Result yang diharapkan adalah </p>
        <pre><code class="language-php">
/** templating */
$this->Migration->newTemplate('str_uniq_20')
/** hasil */
$table->string(nama fild,20)->unique();
/** nama fild mengacu pada name dari defenisi fild() */
</code></pre>
    </article>
</section>
