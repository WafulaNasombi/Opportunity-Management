<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{

   protected $table ='opportunities';

    protected $fillable = [
       
        'user_id',
        'account_id',
        'name',
        'type',
        'description',
        'amount',
        'stage',
        
    ];


    public function account()
    {
        return $this->belongsTo(Account::class,'account_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
