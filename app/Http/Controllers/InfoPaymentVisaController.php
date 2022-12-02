<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\InfoPaymentVisa\InfoPaymentVisa;
use DateTime;

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
        try {
            $rules = [
                'captcha' => 'required|captcha',
                'full_name' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([ 'status' => false,'message' => $validator->errors()->first()], 402);
            } 
            if(!$request->checkbox){
                return response()->json([ 'status' => false,'message' => 'Please accept the terms.Please check box'], 402);
            }
            $check = \Captcha::check($request->captcha);
           
            if($check){
               // lưu vào db
               $datetime = Carbon::now();
               $info_visa = InfoPaymentVisa::create([
                'code' => 'VS'.Utils::getRandom(4).$datetime->format('YmdHis'),
                'full_name' => $request->full_name,
                'passport_data_page_image' => $request->image_passport,
                'portrait_photography' => $request->image_avatar,
                'birthday' => $request->birthday ? date('Y-m-d',strtotime($request->birthday)) : null,
                'nationality' => $request->nationality,
                'nationality_at_birth' => $request->nationality_at_birth,
                'sex' => $request->sex,
                'religion' => $request->religion,
                'occupation' => $request->occupation,
                'permanent_residential_address' => $request->permanent_residential_address,
                'phone' => $request->phone,
                'email' => $request->email,
                'passport_number' => $request->passport_number,
                'passport_type' => $request->passport_type,
                'expiry_date' => $request->expiry_date ? date('Y-m-d',strtotime($request->expiry_date)) : null,
                // 'intended_length_of_stay_in_vn ' => $request->intended_length_of_stay_in_vn,
                'intended_date_of_entry'=> $request->intended_date_of_entry ? date('Y-m-d',strtotime($request->intended_date_of_entry)) : null,
                'purpose_of_entry' => $request->purpose_of_entry,
                'city_province' => $request->city_province,
                'intended_temporaty_residential_address_in_vn' => $request->intended_temporaty_residential_address_in_vn,
                'name_hosting_organisation'=>$request->name_hosting_organisation,
                'address' => $request->address,
                'children_14_years_old' => $request->list_child_items,
                'grant_visa_valid_from' =>$request->grant_visa_valid_from ? date('Y-m-d',strtotime($request->grant_visa_valid_from)) : null,
                'grant_visa_valid_to' => $request->grant_visa_valid_to ? date('Y-m-d',strtotime($request->grant_visa_valid_to)) : null,
                'alowed_to_entry_throuth_checkpoint' => $request->alowed_to_entry_throuth_checkpoint,
                'exit_throuth_checkpoint'=>  $request->exit_throuth_checkpoint,
               ]);
                return response()->json(['status' => true, 'message' => 'insert data success.', 'data' => $info_visa], 200);
            }else{
                return response()->json([ 'status' => false,'message' => 'captcha invalid'], 402);
            }
        } catch (\Exception $th) {
           // chưa có chỗ để lưu
           return response()->json([ 'status' => false,'message' => 'insert data error.'.$th->getMessage()], 402);
        }
       
    }
}
