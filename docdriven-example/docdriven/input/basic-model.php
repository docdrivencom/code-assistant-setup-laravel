<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class TodoItem extends Model
{
    protected $table = 'todo_items';
    protected $fillable = ['name', 'is_complete', 'due_at'];
    protected $visible = ['id', 'name', 'is_complete', 'due_at'];
}