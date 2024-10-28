<?php
namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Index: List all subscriptions
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    // Store: Create a new subscription
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'date_subscribed' => 'required|date',
            'expiring_date' => 'required|date',
            'status' => 'string|max:50',
        ]);

        $subscription = Subscription::create($validated);

        return response()->json($subscription, 201);
    }

    // Show: Display a specific subscription
    public function show(Subscription $subscription)
    {
        return response()->json($subscription);
    }

    // Update: Update a specific subscription
    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'date_subscribed' => 'date',
            'expiring_date' => 'date',
            'status' => 'string|max:50',
        ]);

        $subscription->update($validated);

        return response()->json($subscription);
    }

    // Destroy: Delete a specific subscription
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json(null, 204);
    }
}
