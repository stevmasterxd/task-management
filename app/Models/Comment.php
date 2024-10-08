<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'task_id'];
    public function task()
    {
        return $this->belongsTo(task::class);
    }
}
