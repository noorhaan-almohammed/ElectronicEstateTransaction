<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_type',
                            'description',
                            'required_documents',
                            'cost',
                            'city_id',
                            'contact_method_id',
                            'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function city(){
        return $this->hasOne(City::class);
    }
    public function contact_method(){
        return $this->hasMany(ContactMethod::class);
    }
}
