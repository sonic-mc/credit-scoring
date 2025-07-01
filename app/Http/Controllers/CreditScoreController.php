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
        
        $input_data = $request->only([
            'principal_amount', 
            'monthly_interest_rate', 
            'loan_tenure', 
            'monthly_salary',
            'loan_to_income',
            'customer_age',
            'has_guarantor', 
            'num_installments',
        ]);

       
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
