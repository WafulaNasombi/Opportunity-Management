<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = 'accounts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'logo',
        'name',
        'address',
        'phonenumber',
    ];
 

    //relationship
    public function opportunities(){
        return $this->hasMany(Opportunity::class,'account_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
