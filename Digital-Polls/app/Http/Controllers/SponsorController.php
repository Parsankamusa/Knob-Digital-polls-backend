<?php
namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    // Index: List all sponsors
    public function index()
    {
        $sponsors = Sponsor::all();
        return response()->json($sponsors);
    }

    // Store: Create a new sponsor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'email' => 'nullable|string|email|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);

        $sponsor = Sponsor::create($validated);

        return response()->json($sponsor, 201);
    }

    // Show: Display a specific sponsor
    public function show(Sponsor $sponsor)
    {
        return response()->json($sponsor);
    }

    // Update: Update a specific sponsor
    public function update(Request $request, Sponsor $sponsor)
    {
        $validated = $request->validate([
            'phone_number' => 'numeric',
            'email' => 'nullable|string|email|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);

        $sponsor->update($validated);

        return response()->json($sponsor);
    }

    // Destroy: Delete a specific sponsor
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return response()->json(null, 204);
    }
}
