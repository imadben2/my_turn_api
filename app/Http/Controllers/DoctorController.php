<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Doctor;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Doctor::all();
        return view('pages.doctors.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $items = DB::table('communes')->select('codeW', 'wilaya')->distinct()
            ->orderBy('codeW')->get();

        return view('pages.doctors.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'specialty' => 'required|string',
            'sexe' => 'required|in:male,female',
            'location' => 'nullable|string',
            'wilaya' => 'required|string',
            'commune' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:doctors,email',
            'about' => 'nullable|string',
            // Add additional validation rules as needed
        ]);

        // Create a new instance of the Doctor model
        $doctor = new Doctor;

        // Assign values to the model properties
        $doctor->name = $request->input('name');
        $doctor->phone_number = $request->input('phone_number');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->specialty = $request->input('specialty');
        $doctor->sexe = $request->input('sexe');
        $doctor->location = $request->input('location');
        $doctor->wilaya = $request->input('wilaya');
        $doctor->commune = $request->input('commune');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->email = $request->input('email');
        $doctor->about = $request->input('about');

        // Save the new doctor record to the database
        $doctor->save();

        // Redirect to the index page with a success message
        return redirect()->route('doctors.index')->with('success', 'Médecin ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('pages.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Doctor $doctor)
    {

        $items = DB::table('communes')->select('codeW', 'wilaya')->distinct()
            ->orderBy('codeW')->get();
        return view('pages.doctors.edit', compact('doctor','items'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'specialty' => 'required|string',
            'sexe' => 'required|in:male,female',
            'location' => 'nullable|string',
            'wilaya' => 'required|string',
            'commune' => 'required|string',
            'password' => 'nullable|string', // Password is optional for update
            'email' => 'required|email|unique:doctors,email,' . $id,
            'about' => 'nullable|string',
            // Add additional validation rules as needed
        ]);

        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Update the doctor's information
        $doctor->name = $request->input('name');
        $doctor->phone_number = $request->input('phone_number');
        $doctor->date_of_birth = $request->input('date_of_birth');
        $doctor->specialty = $request->input('specialty');
        $doctor->sexe = $request->input('sexe');
        $doctor->location = $request->input('location');
        $doctor->wilaya = $request->input('wilaya');
        $doctor->commune = $request->input('commune');

        // Update the password only if a new password is provided
        if ($request->filled('password')) {
            $doctor->password = bcrypt($request->input('password'));
        }

        $doctor->email = $request->input('email');
        $doctor->about = $request->input('about');

        // Save the updated doctor record to the database
        $doctor->save();

        // Redirect to the index page with a success message
        return redirect()->route('doctors.index')->with('success', 'Le médecin a été modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = Doctor::findOrFail($request->id)->delete();
        toastr()->success('La suppression est effectué avec succès');
        return redirect()->route('doctors.index');
    }


    public function getCommune($id)
    {
        $list_year = Commune::where("codeW", $id)->pluck("baladiya", "id");
        return $list_year;
    }

}
