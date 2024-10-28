namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Index: Display a listing of the users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Store: Create a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    // Show: Display a specific user
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Update: Update a specific user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'phone' => 'string|max:20',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return response()->json($user);
    }

    // Destroy: Delete a specific user
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
