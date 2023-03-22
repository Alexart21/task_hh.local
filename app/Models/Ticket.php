<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    public function __construct($db)
    {
        $this->connection = $db;
    }

//    protected $guarded = [];
    protected $fillable = [
        'name',
        'phone',
        'msg',
    ];



}
