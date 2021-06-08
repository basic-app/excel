<?php

namespace BasicApp\Excel;

class CsvWriter extends BaseWriter
{

    protected $delimiter = ';';

    protected $enclosure = '"';

    protected $lineEnding = "\r\n";

    public function saveToFile(string $filename)
    {
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($this->_spreadsheet);
        
        $writer->setDelimiter($this->delimiter);

        $writer->setEnclosure($this->enclosure);

        $writer->setLineEnding($this->lineEnding);

        $writer->setSheetIndex(0);

        return $writer->save($filename);
    }

}