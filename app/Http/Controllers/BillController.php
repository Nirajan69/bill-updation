<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::get();
        //  dd($bills);

         return view ('bills.preview',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return create view inside bills folder
        return view('bills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'contact' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_discount' => 'nullable',
        ]);

        // If validation passes, store the data
        Bill::create($request->all());

        // Redirect to the bills index page
        return redirect()->route('bills.index')->with('success', 'Bill created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bill = Bill::findOrFail($id);

    // Pass the bill data to the view
    return view('bills.show', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bill = Bill::findOrFail($id);
    return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $bill = Bill::findOrFail($id);
        $bill->update($request->all());

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $bill->image = $imagePath;
            $bill->save();
        }

        return redirect()->route('bills.index')->with('success', 'Bill updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index');

    }

    public function billcalculation(string $id)
    {
        Bill::get($id);
    }

public function generatePDF($billId)
{
    // Fetch bill data
    $bill = Bill::findOrFail($billId);

    // Generate the PDF
    $pdf = FacadePdf::loadView('bills.show', compact('bill'));

    // Download the generated PDF
    return $pdf->download('bill-details.pdf');
}
}



// public function create()
//     {


//         return view('bills.create');
//     }




//     public function store(Request $request)
//     {

//         $data = $request->validate([
//             'name' => 'required ',
//             'location' => 'required ',
//             'contact' => 'required |numeric',
//             'productname' => 'required',
//             'price' => 'required',
//             'discount' => 'required'
//         ]);



//         $newbills = Bill::create($data);


//         return redirect(route('bill.index'));
//     }
