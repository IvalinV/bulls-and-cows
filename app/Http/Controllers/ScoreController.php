<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display lists of the records
     *
     * @return Response json
     */
    public function index()
    {
        $scores = Score::with('user')->orderBy('full_numbers_found', 'desc')->get();
        return view('topScores', ['scores' => $scores]);
    }

    /**
     * Store the resource in the database.
     *
     * @param Request $request
     * @return response json
     */
    public function store(Request $request)
    {
        abort(200);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $score = Score::create($data);
        
        return response()->json($score);
    }
}
