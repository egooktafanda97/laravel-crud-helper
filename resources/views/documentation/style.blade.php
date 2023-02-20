<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 50px auto;

    }

    table,
    tr,
    td,
    th {
        font-size: 1em !important;
    }

    th {
        color: white;
        font-weight: bold;
    }

    td,
    th {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: left;
        font-size: 18px;
    }

    /*
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {

        table {
            width: 100%;
        }

        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

        td {
            /* Behave  like a "row" */
            border: none;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            /* Label the data */
            content: attr(data-column);

            color: #000;
            font-weight: bold;
        }

    }
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    :root {
        /* Define GDScript highlight.js colors */
        --background-color: #0e1012;
        --text-color: #ccced3;

        --symbol-color: #abc8ff;
        --keyword-color: #ff7085;
        --control_flow_keyword-color: #ff8ccc;
        --base_type-color: #42ffc2;
        --engine_type-color: #8effda;
        --comment-color: grey;
        --string-color: #ffeca1;
        --number-color: #a1ffe0;
        --function_definition-color: #66e6ff;

    }

    pre,
    code,
    code.hljs {
        background: var(--background-color);
        color: var(--text-color);
    }

    code.hljs .hljs-symbol {
        color: var(--symbol-color);
    }

    code.hljs .hljs-keyword {
        color: var(--keyword-color);
    }

    code.hljs .hljs-control_flow_keyword {
        color: var(--control_flow_keyword-color);
    }

    code.hljs .hljs-base_type {
        color: var(--base_type-color);
    }

    code.hljs .hljs-engine_type {
        color: var(--engine_type-color);
    }

    code.hljs .hljs-comment {
        color: var(--comment-color);
    }

    code.hljs .hljs-string {
        color: var(--string-color)
    }

    code.hljs .hljs-number {
        color: var(--number-color);
    }

    code.hljs .hljs-title {
        color: var(--function_definition-color);
    }

    code.hljs .hljs-name,
    code.hljs .hljs-tag,
    code.hljs .hljs-attr {
        color: var(--html-color);
    }

    code {
        margin: 20px;
        padding: 5px 20px;
        display: block;
        position: relative;
        font-size: 0.9em;
        text-align: initial;
        tab-size: 4;
        line-height: 2;
    }

    .inline_code {
        margin: 0;
        padding: 0 5px;
        background-color: grey;
        color: rgba(255, 255, 255, 0.75);
        border: none;
        display: inline-block;
    }

    .nohighlight {
        padding: 10px 12px;
    }

    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: #1c1e21;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #44474a;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #57b3ff;
    }

    * {
        box-sizing: border-box;
    }

    html {
        font-family: Roboto, Helvetica, sans-serif;
    }

    body {
        background-color: #202326;
        color: white;
        text-align: center;
        line-height: 1.75;
    }

    #navbar {
        position: fixed;
        min-width: 350px;
        background-color: #25282b;
        top: 0;
        left: 0;
        width: 400px;
        height: 100%;
        border: none;
    }

    #logo {
        display: block;
        width: 90%;
        height: auto;
        margin-left: auto;
        margin-right: auto;
    }

    header {
        margin: 10px;
        text-align: center;
        font-size: 30px;
    }

    #navbar header {
        color: rgba(255, 255, 255, 0.75);
    }

    #navbar ul {
        height: 70%;
        padding: 0;
        overflow-y: auto;
        overflow-x: hidden;
    }

    #navbar li {
        border: none;
        list-style: none;
        position: relative;
        width: 100%;
    }

    #navbar a {
        display: block;
        padding: 10px 0;
        color: #57b3ff;
        text-decoration: none;
        cursor: pointer;
    }

    #navbar a:hover {
        background-color: #333639;
        color: rgba(255, 255, 255, 0.75);
    }

    #main-doc {
        position: absolute;
        margin-left: 410px;
        padding: 10px;
        margin-bottom: 110px;
    }

    #main-doc header {
        text-align: left;
        margin: 0;
    }

    .main-section,
    section article {
        color: rgba(255, 255, 255, 0.75);
    }

    section article {
        margin 15px;
        font-size: 0.96em;
    }

    section p {
        text-align: left;
        margin: 10px 0;
    }

    section li {
        text-align: left;
    }

    blockquote {
        padding: 10px 0 10px 20px;
        border-left: 4px solid grey;
        text-align: left;
    }

    @media only screen and (max-width: 900px) {

        /* Mobile phones */
        #navbar {
            margin: 0;
            padding: 0;
            width: 100%;
            max-height: 250px;
            position: absolute;
            top: 0;
            z-index: 1;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
        }

        #navbar ul {
            height: 60%;
        }

        #logo {
            display: none;
        }

        #main-doc {
            margin-left: 0;
            margin-top: 250px;
            position: relative;
        }
    }
</style>
