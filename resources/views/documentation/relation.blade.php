<section class="main-section" id="data_relation">
    <header>FOREIGN KEY</header>
    <article>
        <p>
            foreign key Relationship akan terhubung otomatis dengan tablel yang di defenisikan jika di kenfigurasi
            dengan
            benar.
            <br>
            ModelActions::def_relation berperan membuat format relationship pada migrasi.
        </p>
        <pre><code class="language-php">ModelActions::def_relation("user", "users", "users", "id", true)</code></pre>
        <p>
            function def_relation akan membuat format sebagai berikut.
        </p>
        <pre><code class="language-php">
protected static function def_relation($table, $function, $relation_key, $key, $delete = false): array
{
    return [
        "table" => $table,
        "function" => $function, // nama function model pada model
        "relation_index" => $relation_key, // key dari function @relation():array
        "foreign" => [
            "key" => $key, // foreign primary relasi
            "table" => $table,
            "auto_delete_relation" => $delete
        ]
    ];
}</code></pre>
        <p> pada item "relation_index" => $relation_key, akan mengacu pada function <span style="color: red">relation():
                array</span></p>
        <pre><code class="language-php"> 
public function relation(): array
{
    return [
        "users" => [
            "hirarky" => "before",
            "model" => "User",
            "namespace" => "\App\Models\\",
            "foreign" => "user_id",
            "relation" => "belongsTo",
            "delete" => true,
            "file_relation" => ["name" => "User", "file" => "User"]
        ],
    ];
}</code></pre>
    </article>
</section>
