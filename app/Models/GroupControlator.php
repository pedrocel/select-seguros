<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupControlator extends Model
{
    use HasFactory;

    protected $table = 'group_controlators';

    protected $fillable = ['group_id', 'controller_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function controlator()
    {
        return $this->hasOne(Controller::class, 'id', 'controller_id');
    }
}