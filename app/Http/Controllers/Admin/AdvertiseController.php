<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertises = Advertise::orderBy('id', 'desc')->get();
        return view('admin.advertise.index', compact('advertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:35',
            'number' => 'required|string|max:10',
            'link' => 'required|string|max:255',
        ]);

        // Create a new Company instance
        $advertises = new Advertise();

        // Assign validated data to the model
        $advertises->company_name = $validatedData['company_name'];
        $advertises->number = $validatedData['number'];
        $advertises->link = $validatedData['link'];

        // Handle the file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/ads'), $newName); // Use public_path() for better practice
            $advertises->logo = 'images/ads/' . $newName;
        }

        // Save the advertises$advertises instance to the database
        $advertises->save();
        toast('Record added successfully!', 'success');

        // Redirect with a success message
        return redirect()->route('advertise.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertise = advertise::find($id);
        return view('admin.advertise.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:35',
            'number' => 'required|string|max:10',
            'link' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Create a new Company instance
        $advertises =  Advertise::find($id);

        // Assign validated data to the model
        $advertises->company_name = $validatedData['company_name'];
        $advertises->number = $validatedData['number'];
        $advertises->link = $validatedData['link'];
        $advertises->status = $validatedData['status'];


        // Handle the file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $newName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/ads'), $newName); // Use public_path() for better practice
            $advertises->logo = 'images/ads/' . $newName;
        }

        // Save the advertises$advertises instance to the database
        $advertises->update();
        toast('Record updated successfully!', 'success');

        // Redirect with a success message
        return redirect()->route('advertise.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertise = advertise::find($id);
        $advertise->delete();
        toast('Delete  successfully!', 'success');
        return redirect()->route('advertise.index');

    }
}
