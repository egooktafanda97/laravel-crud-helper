<section class="main-section" id="relations">
    <header>Relationship Function</header>
    <article>
        <p>
            fungsi ini akan berakar pada model dan migrasi database, yang akan membuatkan fungsi relasi pada model dan
            akan mendefenisikan relasi pada database.
            <br>
            bebrapa konfigurasi pada fild() function
        </p>
        <pre><code class="language-php">public function relation(): array
{
    return [
        "users" => [
            "hierarchy" => "after", // after|before
            "model" => "User", // nama model yang di gunakan
            "namespace" => "\App\Models\\", // lokasi
            "foreign" => "user_id",
            "relation" => "belongsTo", // type relation
            "delete" => true, // delete otomatis atau tidak , tergantung pada hierarchy
            "file_relation" => ["name" => "User", "file" => "User"]
        ],
        ...
    ];
},</code></pre>

    </article>
</section>
