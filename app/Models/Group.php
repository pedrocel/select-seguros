<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'external_id', 'status', 'type'];

    // Define a relação com GroupControlator
    public function groupControlators()
    {
        return $this->hasMany(GroupControlator::class);
    }
}
