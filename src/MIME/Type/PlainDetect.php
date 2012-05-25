<?php
require_once 'MIME/Type.php';

/**
 * Class to detect the MIME type of plain text files.
 * Especially built to detect programming and markup languages that are commonly
 * detected as "text/plain" by libmagic
 */
class MIME_Type_PlainDetect
{
    public static function autoDetect($file)
    {
        $mt = new MIME_Type();
        $mt->magicFile = __DIR__ . '/../../../data/programming.magic';
        $mt->useMimeContentType = false;
        //fixme: finfo doesn't give the correct results
        // only fixed in PHP 5.4.4
        $mt->useFileCmd = true;
        $mt->useFinfo = false;
        $mt->useExtension = false;
        $type = $mt->autoDetect($file);

        if ($type !== 'text/plain') {
            return $type;
        }


        $type = MIME_Type::autoDetect($file);
        return $type;
    }
}

?>
