<?php namespace App\Http\Controllers;

use App\Models\Practice;
use Auth;

class PracticesController extends Controller
{
    protected $practice;
    protected $user;

    public function __construct(Practice $practice)
    {
        $this->practice = $practice;
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
}
