<!-- resources/views/credit-score.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Credit Scoring</title>
</head>
<body>
    <h1>Credit Scoring</h1>

    <form action="/credit-score/predict" method="POST">
        @csrf
        <label>Principal Amount:</label>
        <input type="number" name="principal_amount" required><br>

        <label>Monthly Interest Rate:</label>
        <input type="number" name="monthly_interest_rate" required><br>

        <label>Loan Tenure:</label>
        <input type="number" name="loan_tenure" required><br>

        <label>Monthly Salary:</label>
        <input type="number" name="monthly_salary" required><br>

        <label>Loan to Income Ratio:</label>
        <input type="number" name="loan_to_income" required><br>

        <label>Customer Age:</label>
        <input type="number" name="customer_age" required><br>

        <label>Has Guarantor:</label>
        <select name="has_guarantor" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br>

        <label>Number of Installments:</label>
        <input type="number" name="num_installments" required><br>

        <button type="submit">Predict</button>
    </form>

    @if(isset($prediction))
        <h2>Prediction Result: {{ $prediction }}</h2>
    @elseif(isset($error))
        <h2 style="color: red;">Error: {{ $error }}</h2>
    @endif
</body>
</html>
