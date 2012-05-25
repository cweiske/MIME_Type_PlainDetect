<?php

class DetectionTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        require_once 'MIME/Type/PlainDetect.php';
    }

    public function getTestFiles()
    {
        $arTestFiles = array();
        foreach (glob(__DIR__ . '/files/*/file-*') as $file) {
            $arTestFiles[] = array(
                $file,
                trim(file_get_contents(dirname($file) . '/mime-type'))
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

        $type = MIME_Type_PlainDetect::autoDetect($file);
        $this->assertEquals(
            $expectedType, $type,
            'MIME type not detected correctly'
        );
    }
}

?>
