<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\SubCategory;
use App\Models\Order;
use App\Models\SubCategoryDetail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        return view('website.pages.home');
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $products = Category::get();
        $subCategory = SubCategory::get();
        return view('website.pages.home', compact('products', 'subCategory'));

    }

    public function buyServices()
    {
        $products = Category::get();
        $subCategory = SubCategory::get();
        return view('website.pages.buy-services', compact('products', 'subCategory'));

    }

    public function blogs()
    {
        return view('website.pages.blogs');

    }

    public function contactUs()
    {
        return view('website.pages.contact-us');

    }

    public function aboutUs()
    {
        return view('website.pages.about-us');

    }

    public function careers()
    {
        return view('website.pages.careers');

    }

    public function portfolio()
    {
        return view('website.pages.portfolio');

    }

    public function quizContest()
    {
        return view('website.pages.quiz-contest');

    }

    public function termsAndConditions()
    {
        return view('website.pages.terms-and-conditions');

    }

    public function service($id)
    {


        if (!auth()->user()) {
            //go to login page
            return redirect()->route('login', ['productId' => $id]);
        }
        try {
            // Decrypt the ID received from the URL
            $decryptedId = decryptstring($id);



            // Retrieve sub-category and related details
            $subCategory = SubCategory::findOrFail($decryptedId);

            $sub_category_detail = SubCategoryDetail::where('sub_category_id', $decryptedId)->get();

            // Check if records are found; if not, abort with a 404 error
            if (!$subCategory || $sub_category_detail->isEmpty()) {
                abort(404); // Handle the case when records are not found
            }

            // Return the view with the retrieved data
            return view('website.pages.service', compact('subCategory', 'sub_category_detail'));
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page
            return response()->view('errors.404', [], 404);
        }
    }

    public function orderDetail($id)
    {
        try {
            // Decrypt the ID received from the URL
            $decryptedId = decryptstring($id);
            // Attempt to find the record with the decrypted ID
            $subCategory = SubCategory::findOrFail($decryptedId);

            // Check if the record is not found
            if (!$subCategory) {
                abort(404); // 404 Not Found status code
            }

            // Return the view with the retrieved data
            return view('website.pages.order-detail', compact('subCategory'));
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page
            return response()->view('errors.404', [], 404);
        }
    }


    public function uploadFile($id)
    {


        try {
            // Decrypt the ID received from the URL
            $decryptedId = decryptstring($id);
            // Attempt to find the record with the decrypted ID
            $subCategory = SubCategory::findOrFail($decryptedId);

            // Check if the record is not found
            if (!$subCategory) {
                abort(404); // 404 Not Found status code
            }

            // Return the view with the retrieved data
            return view('website.pages.upload-files', compact('subCategory'));
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page
            return response()->view('errors.404', [], 404);
        }
    }


    public function confirmAndPay($id, Request $request)
    {

        Session::put('des_data', $request->des_data);


        $payment_methods = PaymentMethod::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();



        try {
            // Decrypt the ID received from the URL
            $decryptedId = decryptstring($id);
            // Attempt to find the record with the decrypted ID
            $subCategory = SubCategory::findOrFail($decryptedId);

            // Check if the record is not found
            if (!$subCategory) {
                abort(404); // 404 Not Found status code
            }

            // Return the view with the retrieved data
            return view('website.pages.confirm-and-pay', compact('subCategory','payment_methods'));
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page
            return response()->view('errors.404', [], 404);
        }
    }

    public function tip($id)
    {
        $subCategory = SubCategory::find(decryptstring($id));
        return view('website.pages.tip', compact('subCategory'));

    }


    public function congratulation($id)
    {
        try {
            // Attempt to find the transaction using decrypted ID
            $transaction = Transaction::findOrFail($id);

            // Retrieve the related sub-category using the transaction's sub_category_id
            $subCategory = SubCategory::find($transaction->sub_category_id);

            // Check if the transaction is not found
            if (!$transaction) {
                abort(404); // 404 Not Found status code
            }

            // Return the view with the retrieved data
            return view('website.pages.congratulation', compact('subCategory', 'transaction'));
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page or handle the error as per your requirements
            return response()->view('errors.404', [], 404);
        }
    }




    // public function congratulation($id)
    // {
    //     $transaction = Transaction::find($id);
    //     $subCategory = SubCategory::find(decryptstring($id));
    //           return view('website.pages.congratulation',compact('subCategory','transaction'));

    // }


    function productSearch($id)
    {
        $subCategory = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.name', 'sub_categories.description', 'sub_categories.image', 'sub_categories.id','sub_categories.category_id')
            ->Where('categories.id', $id)
            ->get();

        $activeCategory =  $id ?? null;



        $products = Category::get();


        return view('website.pages.buy-services', compact('subCategory', 'products','activeCategory'));
    }

    function sub_category_detail_search($id)
    {
        $sub_category_detail = DB::table('sub_category_details')
            // ->join('sub_categories', 'sub_category_details.sub_category_id', '=', 'sub_categories.id')
            ->select('sub_category_details.type', 'sub_category_details.description', 'sub_category_details.price', 'sub_category_details.delivery_time', 'sub_category_details.pages', 'sub_category_details.sub_details')
            ->Where('sub_category_details.id', $id)
            ->first();
        return $sub_category_detail;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
