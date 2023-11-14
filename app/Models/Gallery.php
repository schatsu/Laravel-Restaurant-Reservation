<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
      'title','description','image','order','status'
    ];

    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function() {
            return $this->save();
        });
    }
}
