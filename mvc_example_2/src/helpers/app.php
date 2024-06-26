<?php
function show_error(){
    load_view("header",[
        'title' => '404',
    ]);
    load_view("404Page");
    load_view("footer");
}

function message($title, $message, $type, $buttonText, $mod, $page)
{
    return <<<HTML
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", (event) => {
                        Swal.fire({
                            title: '$title',
                            text: '$message',
                            icon: '$type',
                            confirmButtonText: '$buttonText'
                        }).then(() => {
                            window.location.href = '/?mod=$mod&page=$page';
                        });
                    });
                </script>
            HTML;
}

function getCryptoPrice($symbol, $currency="rls")
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.nobitex.ir/market/stats',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('srcCurrency' => $symbol,'dstCurrency' => $currency),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response, JSON_OBJECT_AS_ARRAY);
    return $response['stats']["$symbol-$currency"]['latest'];
}

function load_view($view, $var=[])
{
    include_once VIEW_DIR . $view . '.php';
}

function  strHash($password)
{
    return md5( 'helloUser' . $password . 'helloUser');
}

//String Sanitizing functions
function stringSanitizer(string $string): string
{
    // Encode HTML entities in the string for safe injection into a document's DOM
    $string = encodeHtmlEntities($string);

    // Sanitize certain HTML tags
    return sanitizeHtmlTags($string);
}

function sanitizeHtmlTags(string $string): string
{
    // Sanitize specific HTML tags
    return preg_replace_callback(
        '/<(script|iframe)[^>]*>.*?<\/\\1>/is',
        function ($matches) {
            return htmlspecialchars($matches[0], \ENT_QUOTES | \ENT_SUBSTITUTE, 'UTF-8');
        },
        $string
    );
}

function encodeHtmlEntities(string $string): string
{
    // HTML entities encoding
    return str_replace(
        ['&quot;', '+', '=', '@', '`', '＜', '＞', '＋', '＝', '＠', '｀'],
        ['&#34;', '&#43;', '&#61;', '&#64;', '&#96;', '&#xFF1C;', '&#xFF1E;', '&#xFF0B;', '&#xFF1D;', '&#xFF20;', '&#xFF40;'],
        htmlspecialchars($string, \ENT_QUOTES | \ENT_SUBSTITUTE, 'UTF-8')
    );
}
