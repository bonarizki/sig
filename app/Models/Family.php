<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function User()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
