<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Practice extends Model
{
    protected $fillable = [
        'started_at',
        'ended_at',
    ];

    protected $dates = [
        'started_at',
        'ended_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
