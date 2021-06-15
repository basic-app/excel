<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Excel;

use PhpOffice\PhpSpreadsheet\IOFactory;

class CsvReader extends BaseReader
{

    public $inputEncoding = 'UTF-8';

    public $fallbackEncoding = null;

    public $delimiter = ';';

    public $enclosure = '';

    public function loadFromFile(string $filename)
    {
        $reader = IOFactory::createReader('Csv');

        $reader->setReadDataOnly($this->readDataOnly);

        if ($this->inputEncoding)
        {
            $reader->setInputEncoding($this->inputEncoding);
        }

        if ($this->fallbackEncoding)
        {
            $reader->setFallbackEncoding($this->fallbackEncoding);
        }

        $reader->setDelimiter($this->delimiter);
        
        $reader->setEnclosure($this->enclosure);
        
        $reader->setSheetIndex(0);

        $this->_spreadsheet = $reader->load($filename);
    }

}