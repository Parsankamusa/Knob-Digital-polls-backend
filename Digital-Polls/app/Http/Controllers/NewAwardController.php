<?php
namespace App\Http\Controllers;

use App\Models\NewAward;
use Illuminate\Http\Request;

class NewAwardController extends Controller
{
    // Index: List all new awards
    public function index()
    {
        $newAwards = NewAward::all();
        return response()->json($newAwards);
    }

    // Store: Create a new award
    public function store(Request $request)
    {
        $validated = $request->validate([
            'award_name' => 'required|string|max:255',
            'award_period' => 'nullable|string|max:255',
            'sponsors' => 'nullable|string|max:255',
            'partners' => 'nullable|string|max:255',
        ]);

        $newAward = NewAward::create($validated);

        return response()->json($newAward, 201);
    }

    // Show: Display a specific new award
    public function show(NewAward $newAward)
    {
        return response()->json($newAward);
    }

    // Update: Update a specific new award
    public function update(Request $request, NewAward $newAward)
    {
        $validated = $request->validate([
            'award_name' => 'string|max:255',
            'award_period' => 'nullable|string|max:255',
            'sponsors' => 'nullable|string|max:255',
            'partners' => 'nullable|string|max:255',
        ]);

        $newAward->update($validated);

        return response()->json($newAward);
    }

    // Destroy: Delete a specific new award
    public function destroy(NewAward $newAward)
    {
        $newAward->delete();

        return response()->json(null, 204);
    }
}
