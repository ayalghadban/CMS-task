<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artical extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'article', 'editor_id'];

    public function editor() : BelongsTo
    {
        return $this->belongsTo(Editor::class);
    }
    public function admin() : BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

}
