<?php namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Auth;

class CurrentPracticeController extends Controller
{
    protected $currentPractice;
    protected $user;

    public function __construct(Practice $practice)
    {
        $this->user = Auth::user();
        $this->currentPractice = $practice->with('exercisePerformances')
        ->where([
            'user_id' => $this->user->id,
        ])
        ->orderBy('created_at')
        ->first();
    }

    public function go(Request $req)
    {
        $totalCount = $this->currentPractice->exerciseCount;
        $exerciseNumber = $totalCount - $this->currentPractice->remainingExerciseCount + 1;


        if ($totalCount < $exerciseNumber) {
            $this->currentPractice->ended_at = Carbon::now();
            $this->currentPractice->save();

            $req->session()->put('finishedPractice', $this->currentPractice);

            return redirect()->route('current-practice.result');
        }

        $exercise = $this->currentPractice->randomExercise();
        $req->session()->put('currentExercise', $exercise);
        $exercise->pivot->started_at = Carbon::now();
        $exercise->pivot->save();

        return view('current-practice.go', compact('exercise', 'totalCount', 'exerciseNumber'));
    }

    public function store(Request $req)
    {
        $exercise = $req->session()->pull('currentExercise');

        $exercise->pivot->ended_at = Carbon::now();
        $exercise->pivot->success = $req->get('success');
        $exercise->pivot->save();

        return redirect()->route('current-practice.go');
    }

    public function result(Request $req)
    {
        $practice = $req->session()->pull('finishedPractice');

        if (!$practice) {
            return redirect()->route('practices.index');
        }

        return view('current-practice.result', compact('practice'));
    }
}
