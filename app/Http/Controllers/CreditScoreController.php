<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreditScoreController extends Controller
{
    public function showForm()
    {
        return view('credit.predict');
    }

    public function predict(Request $request)
    {
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'principal_amount' => $request->principal_amount,
            'monthly_interest_rate' => $request->monthly_interest_rate,
            'loan_tenure' => $request->loan_tenure,
            'monthly_salary' => $request->monthly_salary,
            'loan_to_income' => $request->loan_to_income,
            'customer_age' => $request->customer_age,
            'has_guarantor' => $request->has_guarantor,
            'num_installments' => $request->num_installments
        ]);

        if ($response->successful()) {
            $result = $response->json();
            return view('credit.result', compact('result'));
        } else {
            return back()->with('error', 'API error: ' . $response->body());
        }
    }
}
