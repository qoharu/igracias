<?php
error_reporting(0);

header('Content-Type: application/json');

$q = @$_GET['q'];

$request = array(
'http' => array(
    'method' => 'POST',
    'content' => http_build_query(array(
        'term' => $q,
        'unnamed' => 'sisfo'
    )),
)
);

$context = stream_context_create($request);

$html = file_get_contents('https://igracias.telkomuniversity.ac.id/libraries/ajax/ajax.dashboard.php?act=messagereceiver', false, $context);

echo $html;
?>