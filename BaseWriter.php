<?php

namespace BasicApp\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

abstract class BaseWriter implements WriterInterface
{

    protected $_spreadsheet;

    abstract function saveToFile(string $filename);

    public function __construct(array $data, array $options = [])
    {
        foreach($options as $key => $value)
        {
            $this->$key = $value;
        }

        $this->_spreadsheet = new Spreadsheet;
        
        $sheet = $this->_spreadsheet->getActiveSheet();

        $sheet->fromArray($data, null, 'A1');
    }

    public function save()
    {
        ob_start();
        
        $this->saveToFile('php://output');

        $return = ob_get_contents();
        
        ob_end_clean();

        return $return;
    }

}