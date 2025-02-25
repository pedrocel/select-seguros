<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAcess extends Model
{
    use HasFactory;
    
    protected $table = 'group_acesses';
    
    protected $fillable = ['id', 'name', 'status', 'type'];

    /**
     * Relacionamento um-para-muitos com GroupAcessGroupControllator.
     */
    public function groupAcessGroupControllators()
    {
        return $this->hasMany(GroupAcessGroupControllator::class, 'id_group_acess', 'id');
    }

    /**
     * Relacionamento muitos-para-muitos com GroupControlator via GroupAcessGroupControllator.
     */
    public function groupControlators()
    {
        return $this->belongsToMany(GroupControlator::class, 'group_acess_group_controllators', 'id_group_acess', 'id_group_controllators');
    }
}
