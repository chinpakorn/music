<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_name',
        'borrow_id',
        
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
