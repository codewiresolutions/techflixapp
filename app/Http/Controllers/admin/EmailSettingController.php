<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;


class EmailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $EmailSetting = EmailSetting::all();


            $EmailSettingExists = EmailSetting::exists();
            return view('admin.pages.email-setting.index', compact('EmailSetting','EmailSettingExists'));
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $EmailSetting = EmailSetting::all();
        return view('admin.pages.email-setting.create', compact('EmailSetting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_from_address' => 'required',
        ]);
        $EmailSetting = new EmailSetting();
        $EmailSetting->mail_mailer = $request->get('mail_mailer');
        $EmailSetting->mail_host = $request->get('mail_host');
        $EmailSetting->mail_port = $request->get('mail_port');
        $EmailSetting->mail_username = $request->get('mail_username');
        $EmailSetting->mail_password = $request->get('mail_password');
        $EmailSetting->mail_encrytpion = $request->get('mail_encrytpion');
        $EmailSetting->mail_from_address = $request->get('mail_from_address');
        $EmailSetting->mail_from_name = $request->get('mail_from_name');
        if ($EmailSetting->save()) {
            Session::flash('success', 'Email Setting has been saved successfully.');
        return redirect()->route('admin.email-settings.index');

        } else {
            Session::flash('error', 'There was an error in saving the Email Setting data.');
        return redirect()->route('admin.email-settings.create');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $EmailSetting = EmailSetting::findOrFail($id);
            return view('admin.pages.email-setting.view', compact('EmailSetting'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $EmailSetting = EmailSetting::findOrFail($id);
            return view('admin.pages.email-setting.edit', compact('EmailSetting'));
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_from_address' => 'required',
        ]);
   
       $EmailSetting = EmailSetting::find($id);
       $EmailSetting->mail_mailer = $request->get('mail_mailer');
       $EmailSetting->mail_host = $request->get('mail_host');
       $EmailSetting->mail_port = $request->get('mail_port');
       $EmailSetting->mail_username = $request->get('mail_username');
       $EmailSetting->mail_password = $request->get('mail_password');
       $EmailSetting->mail_encrytpion = $request->get('mail_encrytpion');
       $EmailSetting->mail_from_address = $request->get('mail_from_address');
       $EmailSetting->mail_from_name = $request->get('mail_from_name');

       if ($EmailSetting->save()) {
           Session::flash('success', 'Email Setting has been Updated successfully.');
       } else {
           Session::flash('error', 'There was an error in Updating the Email Setting data.');
       }
   
       return redirect()->route('admin.email-settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $EmailSetting = EmailSetting::find($id);
        $EmailSetting->delete();
        return redirect()->route('admin.email-settings.index')->with('success', 'Email Setting data has been deleted successfully.');

    }
}
