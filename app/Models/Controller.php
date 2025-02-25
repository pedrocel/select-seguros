<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    use HasFactory;

    protected $table = 'controllers';

    protected $fillable = ['id','name','ip', 'port', 'type', 'device_id'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
