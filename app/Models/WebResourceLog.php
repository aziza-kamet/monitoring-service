<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebResourceLog extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $timestamps = null;

    public function webResource()
    {
        return $this->belongsTo(WebResource::class);
    }
}
