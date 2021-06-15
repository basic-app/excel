<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

abstract class BaseReader implements ReaderInterface
{

    protected $_spreadsheet;

    public $readDataOnly = true;

    abstract public function loadFromFile(string $filename);

    public function __construct(array $options = [])
    {
        foreach($options as $key => $value)
        {
            $this->$key = $value;
        }
    }

    public function getActiveSheet()
    {
        return $this->_spreadsheet->getActiveSheet();
    }

}