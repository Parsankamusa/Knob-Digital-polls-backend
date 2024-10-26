namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;

class NomineeController extends Controller
{
    // Index: List all nominees
    public function index()
    {
        $nominees = Nominee::all();
        return response()->json($nominees);
    }

    // Store: Create a new nominee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string',
            'unique_id' => 'required|string|unique:nominees,unique_id',
            'submitted_at' => 'required|date',
        ]);

        $nominee = Nominee::create($validated);

        return response()->json($nominee, 201);
    }

    // Show: Display a specific nominee
    public function show(Nominee $nominee)
    {
        return response()->json($nominee);
    }

    // Update: Update a specific nominee
    public function update(Request $request, Nominee $nominee)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'unique_id' => 'string|unique:nominees,unique_id,' . $nominee->id,
        ]);

        $nominee->update($validated);

        return response()->json($nominee);
    }

    // Destroy: Delete a specific nominee
    public function destroy(Nominee $nominee)
    {
        $nominee->delete();

        return response()->json(null, 204);
    }
}
