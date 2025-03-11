<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Category::get();
        return view('admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:3072', // 3072 kilobytes = 3 megabytes
        ]);
        $category = new Category();
        $category->name = $request->get('name');
        $category->icon = $request->get('icon');
        $category->url = $request->get('url');
        $category->description = $request->get('description');
        $category->image = $this->uploadImage($request->file('image'));
        $category->save();
        if ($category->save()) {
            Session::flash('success', 'Product has been saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the Product data.');
        }
        return redirect()->route('admin.products.index');

    }

    public function uploadImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $explodeImage = explode('.', $fileName);
        $fileName = $explodeImage[0];
        $extension = end($explodeImage);
        $fileName = time() . "-" . $fileName . "." . $extension;
        $folderName = "assets/uploads/products";
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
            // Attempt to find the category using decrypted ID
            $category = Category::findOrFail($decryptedId);

            // Return the view with the retrieved data
            return view('admin.pages.products.edit', compact('category'));
        } catch (ModelNotFoundException $e) {
            // Handle the case when the category is not found
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
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif,svg|max:3072', // Allow image update if present, but not required
        ]);

        $category = Category::find(decryptstring($id));
        $category->name = $request->get('name');
        $category->icon = $request->get('icon');
        $category->url = $request->get('url');
        $category->description = $request->get('description');

        // Check if new image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image and update the image field
            $category->image = $this->uploadImage($request->file('image'));
        }

        if ($category->update()) {
            Session::flash('success', 'Product has been updated successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the Product data.');
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product data has been deleted successfully.');
    }

    public function productDelete()
    {
        return false;
    }
}
