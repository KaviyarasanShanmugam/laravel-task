<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'comments';

    protected $fillable = ['admin_id', 'customer_id', 'description'];


    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
