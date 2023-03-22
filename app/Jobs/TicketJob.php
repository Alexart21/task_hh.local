<?php

namespace App\Jobs;

use App\Http\Classes\SaveFactory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Chat;

class TicketJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $factory = new SaveFactory($this->data['name'], $this->data['phone'], $this->data['msg']);

        $save_to_db = config('ticket.db') ?? false;
        $path_to_file = config('ticket.file') ?? false;
        $sender_emaill = config('ticket.email') ?? false;

        if($save_to_db){
            $db = $factory->saveToDb();
            $db->insert();
        }
        if($path_to_file){
            $file = $factory->saveToFile();
            $file->insert();
        }
        if($sender_emaill){
            $email = $factory->sendToEmail();
            $email->insert();
        }

    }
}
