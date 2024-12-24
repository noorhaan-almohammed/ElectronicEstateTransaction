<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Transaction;
use App\Models\ContactMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display the transaction creation form.
     */
    public function createTransaction()
    {
        $cities = City::all(); // Fetch all cities
        $contactMethods = ContactMethod::all(); // Fetch all contact methods

        return view('pages.transaction', compact('cities', 'contactMethods'));
    }

    /**
     * Store a newly created transaction in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:buy,rent',
            'description' => 'required|string|max:500',
            'required_documents' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'city_id' => 'required|exists:cities,id',
            'contact_method_id' => 'required|exists:contact_methods,id',
            'amount' => 'required|numeric|min:3',
            'stripeToken' => 'required|string',
        ]);

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100, // Convert to cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Transaction fee',
            ]);

            Transaction::create([
                'transaction_type' => $request->type,
                'description' => $request->description,
                'required_documents' => $request->required_documents,
                'cost' => $request->cost,
                'city_id' => $request->city_id,
                'contact_method_id' => $request->contact_method_id,
                'user_id' => Auth::id(),
            ]);

            return response()->json(['success' => true]);
        } catch (\Stripe\Exception\CardException $e) {
            return response()->json(['success' => false, 'message' => 'Card declined: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error processing transaction: ' . $e->getMessage()]);
        }
    }
}
