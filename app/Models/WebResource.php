<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url'
    ];

    public function logs(): HasMany
    {
        return $this->hasMany(WebResourceLog::class);
    }
}
