<?php namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Auth;

class PracticesController extends Controller
{
    protected $practice;
    protected $exercise;
    protected $user;

    public function __construct(Practice $practice, Exercise $exercise)
    {
        $this->practice = $practice;
        $this->exercise = $exercise;
        $this->user = Auth::user();
    }

    public function index()
    {
        $practices = $this->practice
            ->with('exercisePerformances')
            ->where('user_id', $this->user->id)
            ->get();

        return view('practices.index', compact('practices'));
    }

    public function create()
    {
        $exercises = $this->exercise->all();

        return view('practices.create', compact('exercises'));
    }

    public function start(Request $req)
    {
        // Grab the selected exercises
        $selectedExercises = $req->get('exercises');

        // Create a new Practice
        $practice = $this->practice->create([
            'user_id' => $this->user->id,
            'started_at' => Carbon::now(),
        ]);

        // Add exercisePerformances for each selected exercise
        $practice->exercisePerformances()->attach($selectedExercises);

        return redirect()->route('current-practice.go');
    }
}
