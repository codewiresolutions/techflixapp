<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Category::get();
        return view('admin.pages.sub-products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Category::get();
        return view('admin.pages.sub-products.create',compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric|between:1,99999999999999',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:3072', // 3072 kilobytes = 3 megabytes

        ]);
        $sub_category = new SubCategory();
        $sub_category->name = $request->get('name');
        $sub_category->description = $request->get('description');
        $sub_category->price = $request->get('price');
        $sub_category->package_type = $request->get('package_type');
        $sub_category->category_id = $request->get('category_id');
        $sub_category->image = $this->uploadImage($request->file('image'));
        if ($sub_category->save()) {
            Session::flash('success', 'SubCategory has been saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the SubCategory data.');
        }
        return redirect()->route('admin.subcategory.index');
    }


    public function uploadImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $explodeImage = explode('.', $fileName);
        $fileName = $explodeImage[0];
        $extension = end($explodeImage);
        $fileName = time() . "-" . $fileName . "." . $extension;
        $folderName = "assets/admin/subproducts";
        $file->move($folderName, $fileName);
        return $folderName . '/' . $fileName;
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

            // Attempt to find the sub-category using decrypted ID
            $sub_category = SubCategory::findOrFail($decryptedId);

            // Retrieve products for dropdown, assuming Category is related to SubCategory
            $products = Category::all();

            // Return the view with the retrieved data
            return view('admin.pages.sub-products.edit', compact('sub_category', 'products'));
        } catch (ModelNotFoundException $e) {
            // Handle the case when the sub-category is not found
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
            'name' => 'required',
            'price' => 'required|numeric|between:1,99999999999999',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|sometimes|max:3072', // 3072 kilobytes = 3 megabytes

        ]);
        $sub_category =SubCategory::find(decryptstring($id));
        $sub_category->name = $request->get('name');
        $sub_category->description = $request->get('description');
        $sub_category->price = $request->get('price');
        $sub_category->package_type = $request->get('package_type');
        $sub_category->category_id = $request->get('category_id');

       
        // Check if new image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image and update the image field
            $sub_category->image = $this->uploadImage($request->file('image'));
        }

        if ($sub_category->update()) {
            Session::flash('success', 'SubCategory has been updated successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the SubCategory data.');
        }
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('admin.subcategory.index')->with('success', 'SubCategory data has been deleted successfully.');
    }
}
