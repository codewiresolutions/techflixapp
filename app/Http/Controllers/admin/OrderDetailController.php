<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubCategoryDetail;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;



class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_category =SubCategory::get();
        // dd($sub_category);

        return view('admin.pages.subproducts_details.index',compact('sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_category = SubCategory::get();

        return view('admin.pages.subproducts_details.create',compact('sub_category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_category_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|between:1,99999999999999',
            'delivery_time' => 'required',
            'pages' => 'required',
            'sub_details' => 'required',
        ]);

        $sub_category_detail = new SubCategoryDetail();
        $sub_category_detail->sub_category_id = $request->get('sub_category_id');
        $sub_category_detail->type = $request->get('type');
        $sub_category_detail->description = $request->get('description');
        $sub_category_detail->price = $request->get('price');
        $sub_category_detail->delivery_time = $request->get('delivery_time');
        $sub_category_detail->pages = $request->get('pages');
        $sub_category_detail->sub_details = $request->get('sub_details');

        if ($sub_category_detail->save()) {
            Session::flash('success', 'SubCategoryDetail has been saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the SubCategoryDetail data.');
        }
        return redirect()->route('admin.subcategory_deatil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit(string $id)
     {
         try {
             // Decrypt the ID received from the URL
             $decryptedId = decryptstring($id);
     
             // Attempt to find the sub-category detail using decrypted ID
             $sub_category_detail = SubCategoryDetail::findOrFail($decryptedId);
     
             // Retrieve sub-categories for dropdown
             $sub_category = SubCategory::all();
     
             // Return the view with the retrieved data
             return view('admin.pages.subproducts_details.edit', compact('sub_category_detail', 'sub_category'));
         } catch (ModelNotFoundException $e) {
             // Handle the case when the sub-category detail is not found
             abort(404); // 404 Not Found status code
         } catch (\Exception $e) {
             // Log the error for debugging purposes
             Log::error($e);
     
             // Redirect to the custom 404 error page or handle the error as per your requirements
             return response()->view('errors.404', [], 404);
         }
     }
     
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'sub_category_id' => 'required',
            'type' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|between:1,99999999999999',
            'delivery_time' => 'required',
            'pages' => 'required',
            'sub_details' => 'required',
        ]);

        $sub_category_detail = SubCategoryDetail::find(decryptstring($id));
        $sub_category_detail->sub_category_id = $request->get('sub_category_id');
        $sub_category_detail->type = $request->get('type');
        $sub_category_detail->description = $request->get('description');
        $sub_category_detail->price = $request->get('price');
        $sub_category_detail->delivery_time = $request->get('delivery_time');
        $sub_category_detail->pages = $request->get('pages');
        $sub_category_detail->sub_details = $request->get('sub_details');

        if ($sub_category_detail->update()) {
            Session::flash('success', 'SubCategoryDetail has been updated successfully.');
        } else {
            Session::flash('error', 'There was an error in updated the SubCategoryDetail data.');
        }
        return redirect()->route('admin.subcategory_deatil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $SubCategoryDetail = SubCategoryDetail::find($id);
        $SubCategoryDetail->delete();
        return redirect()->route('admin.subcategory_deatil.index')->with('success', 'SubCategoryDetail data has been deleted successfully.');
    }
}
