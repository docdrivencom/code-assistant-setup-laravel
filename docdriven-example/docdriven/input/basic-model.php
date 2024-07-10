<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodoItem extends Model
{
    protected $table = 'todo_items';
    protected $fillable = ['name', 'is_complete', 'due_at'];
    protected $visible = ['id', 'name', 'is_complete', 'due_at'];

    public $timestamps = false; // false when schema does not have created_at and updated_at properties

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
