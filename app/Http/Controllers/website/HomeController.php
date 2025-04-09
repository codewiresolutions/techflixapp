<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\SubCategory;
use App\Models\SubCategoryDetail;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Mail\ContactFormMail;
use Mail;
class HomeController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:500',
        ]);

        try {
            $emailSettings = \App\Models\EmailSetting::first();

            if(!$emailSettings) {
                return back()->with('error', 'Email settings not configured.');
            }

            Mail::to($emailSettings->mail_from_address)
                ->send(new ContactFormMail(
                    $validated,
                    $emailSettings->mail_from_name,
                    $emailSettings->mail_from_address
                ));

            return back()->with('success', 'Thanks for reaching out! We will contact you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, there was an error sending your message.');
        }
    }
    public function index()
    {
        return view('website.pages.home');
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $categories = Category::get();  // Renamed to $categories for better clarity
        $subCategories = SubCategory::get();  // Renamed to $subCategories for clarity
        return view('website.pages.home', compact('categories', 'subCategories'));  // Updated variable names in the compact function
    }


    public function buyServices()
    {
        $categories = Category::get();  // Renamed $products to $categories for clarity
        $subCategories = SubCategory::get();  // Renamed $subCategory to $subCategories for consistency
        return view('website.pages.buy-services', compact('categories', 'subCategories'));  // Updated variable names in the compact function
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
        } catch (Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page
            return response()->view('errors.404', [], 404);
        }
    }

   // In HomeController.php
public function orderDetail($id, Request $request)
{
    try {
        $decryptedId = decryptstring($id);
        $subCategory = SubCategory::findOrFail($decryptedId);

        if (!$subCategory) {
            abort(404);
        }

        // Get the selected type from the request
        $selectedType = $request->query('type');

        // Retrieve the specific sub-category detail based on the selected type
        $subCategoryDetail = SubCategoryDetail::where('sub_category_id', $decryptedId)
            ->where('type', $selectedType)
            ->first();

        if (!$subCategoryDetail) {
            abort(404);
        }

        return view('website.pages.order-detail', compact('subCategory', 'subCategoryDetail'));
    } catch (Exception $e) {
        Log::error($e);
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
        } catch (Exception $e) {
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
            $decryptedId = decryptstring($id);
            $subCategory = SubCategory::findOrFail($decryptedId);
            $sub_category_detail = SubCategoryDetail::where('sub_category_id', $decryptedId)->get();

            if (!$subCategory) {
                abort(404);
            }

            return view('website.pages.confirm-and-pay', compact('subCategory', 'sub_category_detail', 'payment_methods'));
        } catch (Exception $e) {
            Log::error($e);
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
        } catch (Exception $e) {
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
            ->select('sub_categories.name', 'sub_categories.description', 'sub_categories.image', 'sub_categories.id', 'sub_categories.category_id')
            ->Where('categories.id', $id)
            ->get();
        $activeCategory = $id ?? null;
        $products = Category::get();
        return view('website.pages.buy-services', compact('subCategory', 'products', 'activeCategory'));
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

}
