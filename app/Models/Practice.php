<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Practice extends Model
{
    protected $fillable = [
        'user_id',
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

    public function exercisePerformances()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_performances')
            ->withPivot('ended_at', 'started_at');
    }

    public function getIncompleteExercisesAttribute()
    {
        return $this->exercisePerformances->filter(function($exercisePerformance) {
            return $exercisePerformance->pivot->ended_at === null;
        });
    }

    public function getExerciseCountAttribute()
    {
        return $this->exercisePerformances->count();
    }

    public function getRemainingExerciseCountAttribute()
    {
        return $this->getIncompleteExercisesAttribute()->count();
    }

    public function randomExercise()
    {
        $incompleteExercises = $this->getIncompleteExercisesAttribute();

        return $incompleteExercises->random();
    }
}
