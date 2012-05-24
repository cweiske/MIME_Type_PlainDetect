<?php

class DetectionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        require_once 'MIME/Type.php';
    }

    public function getTestFiles()
    {
        $arTestFiles = array();
        foreach (glob(__DIR__ . '/files/*', GLOB_ONLYDIR) as $dir) {
            $arTestFiles[] = array(
                $dir . '/file',
                trim(file_get_contents($dir . '/mime-type'))
            );
        }
        return $arTestFiles;
    }

    /**
     * @dataProvider getTestFiles
     */
    public function testFile($file, $expectedType)
    {
        $this->assertNotEmpty($file, 'File is empty');
        $this->assertNotEmpty($expectedType, 'Expected type is empty');

        $type = $this->detectType($file);
        $this->assertEquals(
            $expectedType, $type,
            'MIME type not detected correctly'
        );
    }

    public function detectType($file)
    {
        $mt = new MIME_Type();
        $mt->magicFile = __DIR__ . '/../data/programming.magic';
        $mt->useMimeContentType = false;
        //fixme: finfo doesn't give the correct results
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
