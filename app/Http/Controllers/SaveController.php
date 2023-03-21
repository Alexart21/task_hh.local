<?php

namespace App\Http\Controllers;

use App\Http\Classes\SaveFactory;
use App\Http\Requests\TicketFormRequest;

class SaveController extends Controller
{
    public function store(TicketFormRequest $request)
    {
        $data = $request->only(['name', 'phone', 'msg']);

        $factory = new SaveFactory($data['name'], $data['phone'], $data['msg']);
        $db = $factory->saveToDb();
        $res1 =  $db->insert();

        $file = $factory->saveToFile();
        $res2 = $file->insert();

        return response()->json([
            'success' => $res1 && $res2,
            'type' => $data
        ]);
    }

}
