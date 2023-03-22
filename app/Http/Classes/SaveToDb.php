<?php

namespace App\Http\Classes;

use App\Models\Ticket;

class SaveToDb implements Save
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
        // передаем имя базы данных для соединения
        // изменить можно в .env
        $ticket = new Ticket(config('ticket.db'));
        $ticket->name = $this->name;
        $ticket->phone = $this->phone;
        $ticket->msg = $this->msg;
        $res = $ticket->save();
        return $res;
    }

}
