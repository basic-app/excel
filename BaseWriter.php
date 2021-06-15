<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
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

        $this->setData($data);
    }

    public function setData(array $data)
    {
        $this->_spreadsheet = new Spreadsheet;
        
        $sheet = $this->_spreadsheet->getActiveSheet();

        $sheet->fromArray($data, null, 'A1');
    }

    public function save() : string
    {
        ob_start();
        
        $this->saveToFile('php://output');

        $return = ob_get_contents();
        
        ob_end_clean();

        return $return;
    }

}