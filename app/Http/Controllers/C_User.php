<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

// use App\Models\Quotation;


class C_Master   extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function master()
    {
        return view('master.home');
    }

    //UNTUK CONTACT US

  //   public function sendcontactus(request $request)

  //   {

  //     $request->validate([

  //         'name' => 'required',

  //         'email' => 'required|email',

  //         'phone' => 'required',

  //         'subject' => 'required',

  //         'message' => 'required',

  //     ]);

  //     $input = $request->all();

  //        //  Send mail to admin

  //     \Mail::send('emails/maknala', array(

  //       'name' => $input['name'],

  //       'email' => $input['email'],

  //       'phone' => $input['phone'],

  //       'subject' => $input['subject'],

  //       'message' => $input['message'],

  //   ), function($message) use ($request){

  //       $message->from($request->email);

  //       $message->to("maknala@arteegroup.id", "Maknala")->subject($request->get('subject'));

  //   });



  //     return redirect()->back()->with(['success' => 'Thank you for your message, we will reply to your message 3 x 24 hours.']);

  // }
}
