<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Index: List all tickets
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json($tickets);
    }

    // Store: Create a new ticket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'ticket_code' => 'required|string|unique:tickets,ticket_code',
        ]);

        $ticket = Ticket::create($validated);

        return response()->json($ticket, 201);
    }

    // Show: Display a specific ticket
    public function show(Ticket $ticket)
    {
        return response()->json($ticket);
    }

    // Update: Update a specific ticket
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'ticket_code' => 'string|unique:tickets,ticket_code,' . $ticket->id,
        ]);

        $ticket->update($validated);

        return response()->json($ticket);
    }

    // Destroy: Delete a specific ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(null, 204);
    }
}
