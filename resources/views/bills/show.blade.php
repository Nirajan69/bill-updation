<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header img {
            width: 80px; 
            height: auto;
        }

        .header .company-details {
            text-align: right;
        }

        .header .company-details p {
            margin: 0;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('image/logo.png') }}" alt="Company Logo">
            <div class="company-details">
                <p>Company Name: {{ $bill->company_name }}</p>
                <p>Location: {{ $bill->company_location }}</p>
                <p>Contact: {{ $bill->contact }}</p>
                <p>Date: {{ date('Y-m-d') }}</p>
            </div>
        </div>

        <h1>Bill Details</h1>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Company Name</td>
                <td>{{ $bill->company_name }}</td>
            </tr>
            <tr>
                <td>Company Location</td>
                <td>{{ $bill->company_location }}</td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>{{ $bill->contact }}</td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td>{{ $bill->product_name }}</td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>{{ $bill->product_price }}</td>
            </tr>
            <tr>
                <td>Product Discount</td>
                <td>{{ $bill->product_discount }}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td>{{ $bill->product_price - $bill->product_discount }}</td>
            </tr>
        </table>
        <a href="{{ route('bills.index') }}" class="back-link">Back to Bills List</a>
        <a href="{{ route('bill.generatePDF', $bill->id) }}" class="btn btn-primary">Download PDF</a>

    </div>
</body>
</html>
