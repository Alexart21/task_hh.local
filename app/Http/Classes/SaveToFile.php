<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SaveToFile implements Save
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
    function insert()
    {
        $content =  'Имя: ' . $this->name . ' Телефон: ' . $this->phone . ' Заявка: ' . $this->msg. "\n";

        $path = config('ticket.file');
        return Storage::append($path, $content);
    }

}
