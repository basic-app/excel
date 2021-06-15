<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Excel;

use PhpOffice\PhpSpreadsheet\Writer\Csv;

class CsvWriter extends BaseWriter
{

    protected $delimiter = ';';

    protected $enclosure = '"';

    protected $lineEnding = "\r\n";

    public function saveToFile(string $filename)
    {
        $writer = new Csv($this->_spreadsheet);
        
        $writer->setDelimiter($this->delimiter);

        $writer->setEnclosure($this->enclosure);

        $writer->setLineEnding($this->lineEnding);

        $writer->setSheetIndex(0);

        return $writer->save($filename);
    }

}