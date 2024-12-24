<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMethod extends Model
{
    use HasFactory;

    protected $fillable = ['method'];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }
}
