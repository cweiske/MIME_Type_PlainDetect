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
        $mt->magicFile = static::getMagicFile();
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

    public static function getMagicFile()
    {
        if ('@data_dir@' != '@' . 'data_dir@') {
            //PEAR-installed version
            return '@data_dir@/MIME_Type_PlainDetect/data/programming.magic';
        }
        return __DIR__ . '/../../../data/programming.magic';
    }
}

?>
