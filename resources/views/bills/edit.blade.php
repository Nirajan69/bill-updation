<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title','Edit Bill Form')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        form input[type="text"], form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        form button {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .save-button {
            background-color: #28a745;
        }

        .save-button:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
<div class="container">
    @section('content')

    {{-- Heading for edit page --}}
    <h1>Edit Page</h1>

    {{-- Anchor tag for back link --}}
    <a href="{{ route('bills.index') }}">&larr; Back</a>

    <form method="post" action="{{ route('bills.update', $bill->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Input Fields with Pre-Filled Values --}}
        <label>Company Name:
            <input type="text" name="company_name" value="{{ $bill->company_name }}" placeholder="Enter company name">
        </label>
        <label>Company Location:
            <input type="text" name="company_location" value="{{ $bill->company_location }}" placeholder="Enter company location">
        </label>

        <label>Contact:
            <input type="text" name="contact" value="{{ $bill->contact }}" placeholder="Enter contact number">
        </label>

        <label for="image">Upload New Image (Optional):
            <input type="file" id="image" name="image">
        </label>

        <label>Product Name:
            <input type="text" name="product_name" value="{{ $bill->product_name }}" placeholder="Enter product name">
        </label>

        <label>Price:
            <input type="text" name="product_price" value="{{ $bill->product_price }}" placeholder="Enter product price">
        </label>

        <label>Discount:
            <input type="text" name="product_discount" value="{{ $bill->product_discount }}" placeholder="Enter product discount">
        </label>

        {{-- Buttons --}}
        <button type="submit" class="save-button">Save Changes</button>
        <button type="button">Cancel</button>
    </form>
</div>
</body>
</html>
