namespace App\Http\Controllers;

use App\Models\AllAwardForm;
use Illuminate\Http\Request;

class AllAwardFormController extends Controller
{
    // Index: List all award forms
    public function index()
    {
        $allAwardForms = AllAwardForm::all();
        return response()->json($allAwardForms);
    }

    // Store: Create a new award form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'action' => 'required|string|max:50',
        ]);

        $allAwardForm = AllAwardForm::create($validated);

        return response()->json($allAwardForm, 201);
    }

    // Show: Display a specific award form
    public function show(AllAwardForm $allAwardForm)
    {
        return response()->json($allAwardForm);
    }

    // Update: Update a specific award form
    public function update(Request $request, AllAwardForm $allAwardForm)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'from' => 'string|max:255',
            'to' => 'string|max:255',
            'action' => 'string|max:50',
        ]);

        $allAwardForm->update($validated);

        return response()->json($allAwardForm);
    }

    // Destroy: Delete a specific award form
    public function destroy(AllAwardForm $allAwardForm)
    {
        $allAwardForm->delete();

        return response()->json(null, 204);
    }
}
