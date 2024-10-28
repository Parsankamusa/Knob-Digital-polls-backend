<?php
namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    // Index: List all votes
    public function index()
    {
        $votes = Vote::all();
        return response()->json($votes);
    }

    // Store: Create a new vote
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'candidate_id' => 'required|exists:nominees,id',
            'mpesa_ref_code' => 'required|string|unique:votes,mpesa_ref_code',
        ]);

        $vote = Vote::create($validated);

        return response()->json($vote, 201);
    }

    // Show: Display a specific vote
    public function show(Vote $vote)
    {
        return response()->json($vote);
    }

    // Update: Update a specific vote
    public function update(Request $request, Vote $vote)
    {
        $validated = $request->validate([
            'mpesa_ref_code' => 'string|unique:votes,mpesa_ref_code,' . $vote->id,
        ]);

        $vote->update($validated);

        return response()->json($vote);
    }

    // Destroy: Delete a specific vote
    public function destroy(Vote $vote)
    {
        $vote->delete();

        return response()->json(null, 204);
    }
}
