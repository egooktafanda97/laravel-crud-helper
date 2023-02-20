<section class="main-section" id="validation">
    <header>TEMPLATE VALIDATION</header>
    <article>
        <p>
            Beberapa validator skema telah di tambahkan
        </p>
        <pre><code class="language-php">[
    "str_null" => "string|nullable",
        
    "file" => "nullable|mimes:jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,zip,ZIP",
        
    "req" => "required",
        
    "req_uniq" => "required|unique:",
        
    "str_req_min6" => "required|string|min:6",
    /*5*/
    "email_uniq" => "required|email|unique:",
        
    "null" => "nullable",
        
    "int_null" => "integer|nullable",
    /*8*/
    "req_int" => "required|integer",
        
    "str_uniq" => "string|unique:",
        
    "str_req" => "required|string",
        
    "confirm_password" => "required|string|confirmed|min:6",
        
    "date_null" => 'date|nullable',
        
    "req_bool"  => 'required|boolean',
        
    "img_req"    => "required|mimes:jpg,png,jpeg,ico,JPG,PNG,JPEG",
        
    "img_null"    => "nullable|mimes:jpg,png,jpeg,ico,JPG,PNG,JPEG",
]</code></pre>
        <p>
            Cara menggunakan nya sederhana sekali, dengan memanggil kode berikut
        </p>
        <pre><code class="language-php">$this->Validation->getTemplate(.. key template ..)</code></pre>
        <p>
            Dapat juga mendefenisikan validasi secara manual dengan cara
        </p>
        <pre><code class="language-php">"validate" => 'required',</code></pre>
    </article>
</section>
