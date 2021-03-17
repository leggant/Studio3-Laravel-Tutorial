<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'usertodos';
    public $timestamps = true;
    protected $fillable = ['title', 'details', 'completed'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
