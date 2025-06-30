<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class CreditScoreController extends Controller
{
    public function index()
    {
        return view('credit-score');
    }

    public function predict(Request $request)
    {
        // Collect all the input data from the form
        $input_data = $request->only([
            'principal_amount', // Principal loan amount
            'monthly_interest_rate', // Monthly interest rate
            'loan_tenure', // Loan tenure in years
            'monthly_salary', // Monthly salary of the applicant
            'loan_to_income', // Loan to income ratio
            'customer_age', // Age of the applicant
            'has_guarantor', // Whether the applicant has a guarantor (1 = Yes, 0 = No)
            'num_installments', // Number of loan installments
        ]);

        // Define the column names as per your training data
        $columns = [
            'principal_amount',
            'monthly_interest_rate',
            'loan_tenure',
            'monthly_salary',
            'loan_to_income',
            'customer_age',
            'has_guarantor',
            'num_installments'
        ];

        // Convert the input data to match the structure of the DataFrame expected by the model
        $input_data_values = array_values($input_data);

        // Ensure that the number of fields matches the model's input structure
        if (count($input_data_values) != count($columns)) {
            return view('credit-score', [
                'error' => 'Input data does not match the expected format.'
            ]);
        }

        // Convert the input data to a JSON string
        $json_data = json_encode($input_data_values);

        // Define the Python path (use full path to Python executable)
        $pythonPath = 'C:\\Users\\user\\AppData\\Local\\Programs\\Python\\Python311\\python.exe';

        // Define the full command to execute the Python script
        $process = new Process([
            $pythonPath,
            storage_path('app/python/predict.py'),
            $json_data
        ]);

        // Run the Python process
        $process->run();

        // Check if the process was successful
        if (!$process->isSuccessful()) {
            // Return error message if the prediction fails
            return view('credit-score', [
                'error' => 'Prediction failed: ' . $process->getErrorOutput()
            ]);
        }

        // Get and clean the prediction output
        $prediction = trim($process->getOutput());

        // Return the prediction to the view
        return view('credit-score', ['prediction' => $prediction]);
    }
}
