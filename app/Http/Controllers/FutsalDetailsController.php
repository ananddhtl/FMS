<?php

namespace App\Http\Controllers;

use App\Models\FutsalDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FutsalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $user = Auth::user();
        $data = FutsalDetails::where('owner_id', $user->id)->get();
        return view('admin.futsaldetails.list', compact('data'));
    }

    public function addfutsaldetails()
    {
        return view('admin.futsaldetails.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  
    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $request->validate([
                'title' => ['required', 'string', 'max:100', 'min:2'],
               
                'description' => ['required', 'string'],
                'thumbnail' => ['required',],
                'pan_vat_docs' => ['required',],
               

            ]);
            $futsaldetails = new FutsalDetails();
            $futsaldetails->title = $request->title;
            $futsaldetails->owner_id = $user->id;
            $futsaldetails->description = $request->description;
            $futsaldetails->status = 0;
           

            if ($request->hasFile('thumbnail')) {
                $image = $request->file('thumbnail');
                $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/futsals/', $img_name);
                $save_url = '/uploads/futsals/' . $img_name;
                $futsaldetails->thumbnail = $save_url;
            }

            if ($request->hasFile('pan_vat_docs')) {
                $image = $request->file('pan_vat_docs');
                $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/pan_vat/', $img_name);
                $save_url = '/uploads/pan_vat/' . $img_name;
                $futsaldetails->pan_vatdocs = $save_url;
            }

            $futsaldetails->save();
            return redirect()->route('getfutsaldetails')->with('message', 'Your data has been saved successfully');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FutsalDetails $futsalDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FutsalDetails $futsalDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FutsalDetails $futsalDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FutsalDetails $futsalDetails)
    {
        //
    }
}
