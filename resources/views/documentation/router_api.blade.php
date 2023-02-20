<section class="main-section" id="relations">
    <header>KONFIGURASI ROUTER API</header>
    <article>
        <p>
            konfigurasi router pada api, response json
        </p>
        <pre><code class="language-php">"get"=> ModelActions::def_router("get", "instansi", "/", $this->Middelware->getTemplate("api_admin"), $this->controller_location . $this->controller)</code></pre>
        <ul>
            <li>
                <code class="inline_code">"get"</code> merupakan nama method pada controller
            </li>
            <li>
                <code class="inline_code">ModelActions::def_router</code>
                <br>
                <pre><code class="language-php">protected static function def_router($method, $prefix, $router, $middleware, $controller): array
{
    return [
            "method" => $method,
            "router" => $router,
            "prefix" => $prefix,
            "middleware" => $middleware,
            "controller" => $controller,
        ];
}</code></pre>
            </li>
        </ul>
    </article>
</section>
