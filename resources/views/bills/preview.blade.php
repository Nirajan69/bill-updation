<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: inline-block;
            margin: 5px 10px;
            font-weight: bold;
            color: #555;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #0095ff;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        a:hover {
            background-color: #0012b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            color: #333;
            font-weight: bold;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"] {
            background-color: #dc3545;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #a71d2a;
        }

        .edit-link {
            margin-right: 10px;
            text-decoration: none;
            color: #a72828;
            font-weight: bold;
        }

        .edit-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<label>Location : </label><label>Company Name</label><label>Logo</label>
<br><br>
<label>Contact</label><label>Date</label><br><br><br><br><br>

<a href="{{route('bills.create')}}">Create</a><br><br><br>

<table>
    <thead>
        <tr>
            <th>S.N</th>
            <th>Item</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Location</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($bills as $bill)
        <tr>

            <td>{{$bill->id}}</td>
            <td>{{$bill->product_name}}</td>
            <td>{{$bill->product_price}}</td>
            <td>{{$bill->product_discount}}</td>


            @php
               $a = $bill->product_price;
               $b = $bill->product_discount;
               $c = $a - $b;
            @endphp

            <td>{{$c}}</td>
            <td>{{$bill->company_location}}</td>

            <td>
                <a href="{{route('bills.edit', $bill->id)}}" class="edit-link">Edit</a>
                <form action="{{route('bills.destroy', $bill->id)}}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="{{route('bills.show',$bill->id)}}" class="edit-link">Show</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
