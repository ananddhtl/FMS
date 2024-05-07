<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve payments with related user and futsal details
        $data = Payment::join('normal_users', 'payments.user_id', '=', 'normal_users.id')
                       ->join('futsal_details', 'payments.futsal_id', '=', 'futsal_details.id')
                       ->select('payments.*', 'normal_users.*', 'futsal_details.*')
                       ->get();
  
        return view('admin.payment', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function verifyPayment(Request $request)
{
    // Get token and itemId from the request
    $token = $request->token;
    $itemId = $request->itemId;

    // Construct the request parameters
    $args = http_build_query([
        'token' => $token,
        'amount' => 1000

    ]);
 

    // Khalti API endpoint
    $url = "https://khalti.com/api/v2/payment/verify/";

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Set authorization header
    $secret_key = config('app.khalti_secret_key');
    $headers = ["Authorization: Key $secret_key"];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Execute cURL request
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);


    $user = \DB::table('normal_users')->select('id', 'name')->where('password', session()->get('sessionUser'))->first();
    
    $futsaldetails = new Payment();
    $futsaldetails->futsal_id = $itemId;
    $futsaldetails->user_id = $user->id;
    $futsaldetails->amount = 120;
    $futsaldetails->tCode = $token;
    $futsaldetails->save();
   
    return $response;
}

public function storePayment(Request $request)
{

    
   
  
   
    return response()->noContent();
}

}
