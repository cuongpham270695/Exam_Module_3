<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = [
       'id','code','name','phone','email','address','manager'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
