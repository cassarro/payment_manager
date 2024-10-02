<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    // Method to display all available payment methods
    public function index()
    {
        // Retrieve all payment methods from the PaymentMethod model
        $paymentMethods = PaymentMethod::all();

        // Pass the data to the view
        return view('payment-methods.index', compact('paymentMethods'));
    }
}
