<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'due_date', 'status'];

    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}
