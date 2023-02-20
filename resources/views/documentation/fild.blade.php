<section class="main-section" id="fild">
    <header>FILD SCEMA</header>
    <article>
        <p>
            bebrapa konfigurasi pada fild() function
        </p>
        <p>Template Scema Type Foregn Key</p>
        <pre><code class="language-php">
[
    /** NAMA FILD */
    "name" =>  "user_id",
    /** JIKA FOREIGN KEY INSERT before / after  */
    "control_insert" => "before",
    /** PELABELAN BOLEH KOSONG JIKA TIDAK DIGUNAKAN */
    "label" => "",
    /** TYPE DATA */
    "type" => "key",
    /** TEMPLATING MIGRATION DATABASE */
    "migration" => $this->Migration->getTemplate("primary"),
    /** TEMPLATING MIGRATION DATABASE / STRING VALIDASI */
    "validate" => 2,
    /** REQUET INPUT ATAU OTOMATIS TERISI */
    "request" => false,
    /** DEFENISIKAN RELASI DATA JIKA FILD FOREIGN KEY */
    "relation" => ModelActions::def_relation("user", "users", "users", "id", true)
]</code></pre>
        <p>
            Type fild yang telah di konfigurasi
        </p>
        <table>
            <tr>
                <td>TYPE</td>
                <td>KET</td>
                <td>EX</td>
            </tr>
            <!--*************************************************************************
                | TYPE IMAGE / FILE UPLOAD
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">image / file upload</td>
                <td style="width: 20%">
                    <p>
                        Type image / file upload akan merupakan fild untuak menampung path image / file upload, beberapa
                        aturan dalam pendefenisian
                    </p>
                </td>
                <td>
                    <pre><code class="language-php">[
            "name" => "foto",
            "label" => "",
            "type" => "image",
            "path" => "imags/foto", // path penyimpanan, didalam asset()
            "request" => true,
            "migration" => $this->Migration->newTemplate("str_null_100"),
            "validate" => "string|nullable",
]</code></pre>
                </td>
            </tr>
            <!--*************************************************************************
                | TYPE STATIC
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">static</td>
                <td style="width: 20%">
                    <p>
                        type static yaitu fild yang akan terisi otomatis seperti yang di defenisikan di awal, ini
                        berguna untuk fild status
                    </p>
                </td>
                <td>
                    <pre><code class="language-php">[
            "name" => "status",
            "label" => "",
            "type" => "static",
            "value" => "pending",
            "request" => false,
            "migration" => $this->Migration->newTemplate("str_null_10"),
            "validate" => "string|nullable",
]</code></pre>
                </td>
            </tr>

            <!--*************************************************************************
                | TYPE KEY
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">key</td>
                <td style="width: 20%">
                    <p>
                        Type key merupakan type yang akan digunakan untuk foregn key
                    </p>
                </td>
                <td>
                    <pre><code class="language-php"> [
    /** NAMA FILD */
    "name" =>  "user_id",
    /** JIKA FOREIGN KEY INSERT before / after  */
    "control_insert" => "before",
    /** PELABELAN BOLEH KOSONG JIKA TIDAK DIGUNAKAN */
    "label" => "",
    /** TYPE DATA */
    "type" => "key",
    /** TEMPLATING MIGRATION DATABASE */
    "migration" => $this->Migration->getTemplate("primary"),
    /** TEMPLATING MIGRATION DATABASE / STRING VALIDASI */
    "validate" => 2,
    /** REQUET INPUT ATAU OTOMATIS TERISI */
    "request" => false,
    /** DEFENISIKAN RELASI DATA JIKA FILD FOREIGN KEY */
    "relation" => ModelActions::def_relation("user", "users", "users", "id", true)
]</code></pre>
                </td>
            </tr>
            <!--*************************************************************************
                | TYPE AUTO
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">Auto</td>
                <td style="width: 20%">
                    <p>
                        Type auto merupakan type yang akan di gunakan untuk fild yang akan di isi otomatis oleh
                        management package, <br>
                    </p>
                </td>
                <td>
                    Beberapa fild auto telah di defenisikan pada script <a href="#config_helper">
                        <code class="inline_code">App\Service\Helper\Configure</code>
                    </a>
                    <br>
                    <pre><code class="language-php"> [
            "name" => "tanggal",
            "label" => "",
            "type" => "auto",
            "config"=>[
                "def_value" => "",
                "case" => "date"
            ]
            "request" => false,
            "migration" => $this->Migration->newTemplate("str_null_100"),
            "validate" => "string|nullable",
],</code></pre>
                </td>
            </tr>
            <!--*************************************************************************
                | TYPE CRYPT
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">ecrypt</td>
                <td style="width: 20%">
                    <p>
                        Type auto merupakan type yang akan di gunakan untuk fild password, <br>
                    </p>
                </td>
                <td>
                    <pre><code class="language-php"> [
        "name" => "password",
        "label" => "",
        "type" => "ecrypt", //  bcrypt
        "request" => true,
        "migration" => $this->Migration->newTemplate("str_null_100"),
        "validate" => "string|nullable",
]</code></pre>
                </td>
            </tr>
            <!--*************************************************************************
                | TYPE AUTO
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">paret_value</td>
                <td style="width: 20%">
                    <p>
                        Type auto merupakan type yang akan di untuk mengambil data parent insert yang sama, contoh data
                        person dan user dengan nama yang sama. <br>
                    </p>
                </td>
                <td>
                    hanya digunakan ketika fild di inset child fild
                    </a>
                    <br>
                    <pre><code class="language-php"> [
        "name" => "nama",
        "label" => "",
        "type" => "paret_value", 
        "request" => false,
        "migration" => $this->Migration->newTemplate("str_null_100"),
        "validate" => "string|nullable",
]</code></pre>
                </td>
            </tr>
            <!--*************************************************************************
                | TYPE DEFAULT / STRING / INTEGER
                ************************************************************************* -->
            <tr>
                <td style="width: 20%">string|default</td>
                <td style="width: 20%">
                    <p>
                        Type ini paling sering digunakan karna bersifat universal & tanpa konfigurasi dari pckage, ini
                        akan meneruskan request ke database<br>
                    </p>
                </td>
                <td>
                    <pre><code class="language-php"> [
        "name" => "nama",
        "label" => "",
        "type" => "string", 
        "migration" => $this->Migration->newTemplate("str_null_100"),
        "validate" => "string|nullable",
]</code></pre>
                </td>
            </tr>
        </table>
    </article>
</section>
