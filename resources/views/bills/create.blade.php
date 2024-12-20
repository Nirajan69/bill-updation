<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @section('title', 'Bill-Form Creation')
    </title>
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

        form input[type="text"],
        form input[type="file"] {
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

        .preview-button {
            background-color: #28a745;
        }

        .preview-button:hover {
            background-color: #1e7e34;
        }
    </style>
</head>

<body>
    <div class="container">
        @section('content')

            {{-- Heading for create page --}}
            <h1>Create Page</h1>

            {{-- Anchor tag for back link --}}
            <a href="{{ route('bills.index') }}">&larr; Back</a>



            <form method="post" action="{{ route('bills.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')


                {{-- Input Fields --}}
                <label>Company Name:
                    <input type="text" name="company_name" placeholder="Enter company name">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('company_name') }}</div>
                    @endif
                </label>
                <label>Company Location:
                    <input type="text" name="company_location" placeholder="Enter company location">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('company_location') }}</div>
                    @endif
                </label>

                <label>Contact:
                    <input type="text" name="contact" placeholder="Enter contact number">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('contact') }}</div>
                    @endif
                </label>

                <label for="image">Upload Image:
                    <input type="file" id="image" name="image">
                </label>

                <label>Product Name:
                    <input type="text" name="product_name" placeholder="Enter product name">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('product_name') }}</div>
                    @endif
                </label>

                <label>Price:
                    <input type="text" name="product_price" placeholder="Enter product price">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('product_price') }}</div>
                    @endif
                </label>

                <label>Discount:
                    <input type="text" name="product_discount" placeholder="Enter product discount">
                    @if ($errors->has('company_name'))
                        <div style="color: red; font-size: 12px;">{{ $errors->first('product_discount') }}</div>
                    @endif
                </label>

                {{-- Buttons --}}
                <button type="submit" class="preview-button">Preview</button>
                <button type="button">Download</button>
            </form>
        </div>
    </body>

    </html>

    