<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{

    use HasFactory;
    use Notifiable;

    protected $fillable = [
      'name', 'phone','email',
      'person','date','time',
      'message','status',
    ];


    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        })->orWhere('phone', 'LIKE', '%' . $search . '%');
    }
}
