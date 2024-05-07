<?php

namespace App\Http\Controllers;

use App\Models\BookFutsals;
use Illuminate\Http\Request;

class BookFutsalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = \DB::table('normal_users')->select('id', 'name')->where('password', session()->get('sessionUser'))->first();
   
       
        
        
        $bookedFutsals = BookFutsals::where('user_id', $user->id)
                                     ->join('futsal_details', 'book_futsals.futsal_id', '=', 'futsal_details.id')
                                     ->select('book_futsals.*', 'futsal_details.*')
                                     ->first();
    
    
        return view('frontend.bookedfutsals', compact('bookedFutsals'));
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
               
                
                $book = new BookFutsals();
                $book->futsal_id = $request->futsal_id;
                $book->time_slots = $request->time_slot;
                $book->user_id = $request->user_id;
                $book->date = today();
                $book->save();
                return redirect()->back()->with('message', 'Your data has been saved successfully');
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
    public function show(BookFutsals $bookFutsals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookFutsals $bookFutsals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookFutsals $bookFutsals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookFutsals $bookFutsals)
    {
        //
    }
}
