<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'id';
    protected $table = 'todos';
    public $timestamps = true;
    protected $fillable = ['title', 'body', 'completed', 'priority'];
}
