<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Index: List all events
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    // Store: Create a new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event = Event::create($validated);

        return response()->json($event, 201);
    }

    // Show: Display a specific event
    public function show(Event $event)
    {
        return response()->json($event);
    }

    // Update: Update a specific event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'date' => 'date',
            'location' => 'string|max:255',
        ]);

        $event->update($validated);

        return response()->json($event);
    }

    // Destroy: Delete a specific event
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(null, 204);
    }
}
