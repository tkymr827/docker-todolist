<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    //
    protected $fillable = [
        "name", "taskname", "content", "deadline", "complite", "release"
    ];
}
