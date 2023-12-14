<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];
    
    public function article() : HasMany
    {
        return $this->hasMany(Artical::class);
    }
}
