<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebResourceLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'web_resource_id',
        'requested_at'
    ];

    public function webResource(): BelongsTo
    {
        return $this->belongsTo(WebResource::class);
    }
}
