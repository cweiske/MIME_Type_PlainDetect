<?php
if ($argc !== 2) {
    echo "Please pass one and only one filename\n";
    exit(1);
}
$file = $argv[1];
if (!is_readable($file)) {
    echo "File does not exist or is not readable\n";
    exit(2);
}
if (is_dir(__DIR__ . '/src')) {
    set_include_path(
        get_include_path() . PATH_SEPARATOR . __DIR__ . '/src'
    );
}
require_once 'MIME/Type/PlainDetect.php';
$type = MIME_Type_PlainDetect::autoDetect($file);
if ($type == 'text/plain') {
}

echo $type . "\n";
?>
