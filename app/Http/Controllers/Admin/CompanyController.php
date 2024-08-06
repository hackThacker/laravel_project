<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::first();
       return view('admin.company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:35',
        'email' => 'required|email|max:35',
        'number' => 'required|string|max:10',
        'location' => 'required|string|max:35',
        'editor_name' => 'required|string|max:35',
        'pan_no' => 'nullable|string|max:25',
        'company_no' => 'nullable|string|max:25',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'youtube' => 'nullable|url',
        'twitter' => 'nullable|url',
    ]);

    // Create a new Company instance
    $company = new Company();

    // Assign validated data to the model
    $company->name = $validatedData['name'];
    $company->email = $validatedData['email'];
    $company->number = $validatedData['number'];
    $company->location = $validatedData['location'];
    $company->editor_name = $validatedData['editor_name'];
    $company->pan_no = $validatedData['pan_no'];
    $company->company_no = $validatedData['company_no'];
    $company->facebook = $validatedData['facebook'];
    $company->instagram = $validatedData['instagram'];
    $company->youtube = $validatedData['youtube'];
    $company->twitter = $validatedData['twitter'];

    // Handle the file upload
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $newName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $newName); // Use public_path() for better practice
        $company->logo = 'images/' . $newName;
    }

    // Save the company instance to the database
    $company->save();
    toast('Record added successfully!', 'success');

    // Redirect with a success message
    return redirect()->route('company.index')->with('update', 'Company update successfully.');
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
        $company = company::find($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:35',
        'email' => 'required|email|max:35',
        'number' => 'required|string|max:10',
        'location' => 'required|string|max:35',
        'editor_name' => 'required|string|max:35',
        'pan_no' => 'nullable|string|max:25',
        'company_no' => 'nullable|string|max:25',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'youtube' => 'nullable|url',
        'twitter' => 'nullable|url',
    ]);

    // Create a new Company instance
    $company =  Company::find($id);

    // Assign validated data to the model
    $company->name = $validatedData['name'];
    $company->email = $validatedData['email'];
    $company->number = $validatedData['number'];
    $company->location = $validatedData['location'];
    $company->editor_name = $validatedData['editor_name'];
    $company->pan_no = $validatedData['pan_no'];
    $company->company_no = $validatedData['company_no'];
    $company->facebook = $validatedData['facebook'];
    $company->instagram = $validatedData['instagram'];
    $company->youtube = $validatedData['youtube'];
    $company->twitter = $validatedData['twitter'];

    // Handle the file upload
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $newName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $newName); // Use public_path() for better practice
        $company->logo = 'images/' . $newName;
    }

    // Save the company instance to the database
    $company->update();

    toast('Record updated successfully!', 'success');


    // Redirect with a success message
    return redirect()->route('company.index')->with('success', 'Company created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $company = Company::find($id);
      $company->delete();
      return redirect()->back();
    }
}
