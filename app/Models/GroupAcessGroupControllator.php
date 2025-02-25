<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAcessGroupControllator extends Model
{
    use HasFactory;

    protected $table = 'group_acess_group_controllators';

    protected $fillable = ['id_group_acess', 'id_group_controllators'];

    public function groupAcess()
    {
        return $this->hasOne(GroupAcess::class, 'id', 'id_group_acess');
    }

    public function groupControllator()
    {
        return $this->hasMany(GroupControlator::class, 'id', 'id_group_controllators');
    }
}
