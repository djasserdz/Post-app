<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class google extends Model
{
    use HasFactory;
    protected $table = 'google_logins';
    protected $fillable=[
        'google_id',
        'google_token',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
