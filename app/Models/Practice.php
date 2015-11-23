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
            ->withPivot('ended_at', 'started_at', 'success');
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

    public function getCompletionTimeAttribute()
    {
        return $this->started_at->diffForHumans($this->ended_at, true);
    }

    public function getSuccessRateAttribute()
    {
        $length = $this->exercisePerformances->count();

        return $this->exercisePerformances->reduce(function($carry, $performance) use ($length) {
            $val = $performance->pivot->success ? 100 : 0;

            return $carry + $val / $length;
        }, 0);
    }

    public function randomExercise()
    {
        $incompleteExercises = $this->getIncompleteExercisesAttribute();

        return $incompleteExercises->random();
    }
}
