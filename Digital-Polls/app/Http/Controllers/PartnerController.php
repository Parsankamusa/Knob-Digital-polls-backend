namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // Index: List all partners
    public function index()
    {
        $partners = Partner::all();
        return response()->json($partners);
    }

    // Store: Create a new partner
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'required|numeric',
            'email' => 'nullable|string|email|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);

        $partner = Partner::create($validated);

        return response()->json($partner, 201);
    }

    // Show: Display a specific partner
    public function show(Partner $partner)
    {
        return response()->json($partner);
    }

    // Update: Update a specific partner
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'phone_number' => 'numeric',
            'email' => 'nullable|string|email|max:255',
            'company_name' => 'nullable|string|max:255',
        ]);

        $partner->update($validated);

        return response()->json($partner);
    }

    // Destroy: Delete a specific partner
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return response()->json(null, 204);
    }
}
