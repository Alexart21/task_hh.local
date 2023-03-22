<?php

namespace App\Http\Classes;

class SendToEmail implements Save
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
        // не реализовано пока
        return true;
    }
}
