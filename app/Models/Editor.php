<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Editor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'password', 'isCreate', 'isEdit', 'isDelete'];

    public function article() : HasMany {
        return $this->hasMany(Artical::class);
    }
    

}
