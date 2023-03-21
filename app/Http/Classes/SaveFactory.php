<?php

namespace App\Http\Classes;

use App\Http\Classes\Save;
use App\Http\Controllers\Controller;
use App\Http\Classes\SaveToDb;
use App\Http\Classes\SaveToFile;

class SaveFactory extends Controller
{
    private $name;
    private $phone;
    private $msg;

    public function __construct($name, $phone, $msg)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->msg = $msg;
    }
    public function saveToDb() : SaveToDb
    {
        return new SaveToDb($this->name, $this->phone, $this->msg);
    }

    public function saveToFile() : SaveToFile
    {
        return new SaveToFile($this->name, $this->phone, $this->msg);
    }

}
