<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Excel;

interface ReaderInterface
{

    public function loadFromFile(string $filename);

}