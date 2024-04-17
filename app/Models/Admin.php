<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public $table = 'admin';

    protected $fillable = ['name'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}