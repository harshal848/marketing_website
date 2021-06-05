<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Application;
use App\BrouchureReq;
use App\Client;
use App\ContactUs;
use App\Enquiry;
use App\FC_reg;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    public function application(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|min:10|numeric',   // find validation rule for phone no.
            'dob' => 'required|date',   // date format = dd-mm-yyyy
            'qualification' => ['required', 'string', 'max:255'],

            //change mimes
             'resume' => 'required|max:2048|mimes:doc,docx,pdf'
        ]);

        $applicant = new Application;
        $applicant->full_name = $request->full_name;
        $applicant->email_id = $request->email_id;
        $applicant->phone = $request->phone;
        $applicant->dob = $request->dob;
        $applicant->qualification = $request->qualification;

        $file = $request->file('resume');
        $file_name = $applicant->full_name . time() . '_Resume' . $file->getClientOriginalExtension();
        $file->move(public_path('resumes/'), $file_name);

        $applicant->resume = $file_name;
        $applicant->save();

        return redirect('/');

    }

    public function brouchure_req1(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required', 'string', 'email', 'max:255'],
            'contact_no' => 'required|min:10|numeric'   // find validation rule for phone no.
        ]);

        $newReq = new BrouchureReq;
        $newReq->full_name = $request->full_name;
        $newReq->email_id = $request->email_id;
        $newReq->contact_no = $request->contact_no;
        $newReq->save();

        return response()->download(public_path('brouchers/Collect_kart.pdf'));
    }

    public function brouchure_req2(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required', 'string', 'email', 'max:255'],
            'contact_no' => 'required|min:10|numeric'   // find validation rule for phone no.
        ]);

        $newReq = new BrouchureReq;
        $newReq->full_name = $request->full_name;
        $newReq->email_id = $request->email_id;
        $newReq->contact_no = $request->contact_no;
        $newReq->save();

        return response()->download(public_path('brouchers/Collect_kart.pdf'));
    }

    public function brouchure_req3(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required', 'string', 'email', 'max:255'],
            'contact_no' => 'required|min:10|numeric'   // find validation rule for phone no.
        ]);

        $newReq = new BrouchureReq;
        $newReq->full_name = $request->full_name;
        $newReq->email_id = $request->email_id;
        $newReq->contact_no = $request->contact_no;
        $newReq->save();

        return response()->download(public_path('brouchers/API_Broucher.pdf'));
    }

    public function fc_reg(Request $request){
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'contact_no' => 'required|min:10|numeric',   // find validation rule for phone no.
            'pincode' => 'required|min:6|numeric'
        ]);

        $newReq = new FC_reg;
        $newReq->full_name = $request->full_name;
        $newReq->pincode = $request->pincode;
        $newReq->contact_no = $request->contact_no;
        $newReq->save();

        return redirect()->away('https://play.google.com/store/apps/details?id=com.docboyzpro');
    }

    public function client_reg(Request $request){
        Client::create($request->all());
        return redirect('/');
    }

    public function agency_reg(Request $request){
        Agency::create($request->all());
        return redirect('/');
    }

    public function contactus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile_no' => 'required|min:10|numeric',   // find validation rule for phone no.
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string']
        ]);

        $contact = new ContactUs;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->mobile_no = $request->mobile_no;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        return redirect('/');
    }

    public function enquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email_id' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|min:10|numeric',   // find validation rule for phone no.
            'enquiry_for' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string']
        ]);

        $enquiry = new Enquiry;
        $enquiry->full_name = $request->full_name;
        $enquiry->email_id = $request->email_id;
        $enquiry->phone = $request->phone;
        $enquiry->enquiry_for = $request->enquiry_for;
        $enquiry->message = $request->message;

        $enquiry->save();

        return redirect('/');
    }

}
