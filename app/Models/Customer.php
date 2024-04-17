<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $table = 'customer';

    protected $fillable = ['name'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
