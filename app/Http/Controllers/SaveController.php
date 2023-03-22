<?php

namespace App\Http\Controllers;

use App\Http\Classes\SaveFactory;
use App\Http\Requests\TicketFormRequest;
use App\Jobs\TicketJob;

class SaveController extends Controller
{
    public function store(TicketFormRequest $request)
    {

        $data = $request->only(['name', 'phone', 'msg']);

        $factory = new SaveFactory($data['name'], $data['phone'], $data['msg']);

        $save_to_db = config('ticket.db') ?? false;
        $path_to_file = config('ticket.file') ?? false;
        $sender_emaill = config('ticket.email') ?? false;

        // без очередей
        /*$flag = true;
        if($save_to_db){
            $db = $factory->saveToDb();
            $res =  $db->insert();
            $flag = $flag && $res;
        }
        if($path_to_file){
            $file = $factory->saveToFile();
            $res = $file->insert();
            $flag = $flag && $res;
        }
        if($sender_emaill){
            $email = $factory->sendToEmail();
            $res = $email->insert();
            $flag = $flag && $res;
        }

        return response()->json([
            'success' => $flag,
        ]);*/


        // отправляем в очередь
        TicketJob::dispatch($data);

        return response()->json([
            'success' => true,
        ]);
    }

}
