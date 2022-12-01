<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\InfoPaymentVisa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InfoPaymentVisaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['passport_type'] = Utils::passport_type;
        $data['city_province'] = Utils::city_province;
        $data['current_nationality'] = Utils::current_nationality;
        $data['entry_through_checkpoint'] = Utils::entry_through_checkpoint;
        $data['purpose_of_entry'] = Utils::purpose_of_entry;
        $data['captcha_src'] = '/captcha'.explode('captcha',captcha_src())[1] ;
        // dd($data);
        return view('info_payment_visa',$data);
    }
    public function store(Request $request)
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
        $check = \Captcha::check($request->captcha);
        if($check){
            echo 'Thành công'.$check;
        }else{
            echo 'Thất bại'.$check;
        }
    //    $info_payment =  InfoPaymentVisa::create([

    //     ]);
        // dd($validator);
    }
}
