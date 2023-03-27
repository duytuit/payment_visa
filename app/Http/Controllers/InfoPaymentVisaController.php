<?php

namespace App\Http\Controllers;

use App\Helpers\dBug;
use App\Helpers\Lib\Utils\AlepayUtils;
use App\Helpers\Utils;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\InfoPaymentVisa\InfoPaymentVisa;
use App\Models\InfoPaymentVisa\transactionPayment;
use DateTime;
use Illuminate\Support\Str;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $infovisas = InfoPaymentVisa::paginate(15);
        return view('admin.infovisa.list', compact('infovisas'));
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
        $data['captcha_src'] = Utils::generateCaptcha();
        $data['sumery'] = config('aleypay.sumery');
        $data['currency'] = 23534;//$this->convertUsdToVnd()->result;
        $data['logoBankATM'] = Utils::list_bank_atm;
        $data['logoBankTransferOnline'] = Utils::list_bank_transfer_online;
        $data['logoBankQRcode'] = Utils::list_bank_qr_code;
        $data['logoBankVA'] = Utils::list_bank_va;
        $data['get_session'] = Session::get('captcha');
        return view('info_payment_visa',$data);
    }
    public function callback(Request $request)
    {
        $input = $request->all();
        $transaction_payment = transactionPayment::where('transaction_code',$request->transactionCode)->first();
        $data['errorCode'] = $request->errorCode;
        $data['transaction_code'] = $request->transactionCode;
        if($transaction_payment){
            $transaction_payment->status = $request->errorCode;
            $transaction_payment->response = json_encode($input);
            $transaction_payment->save();
            $data['info_payment'] = InfoPaymentVisa::find($transaction_payment->info_payment_id);
            $data['transaction_payment'] = $transaction_payment;
        }
        return view('callback_result',$data);
    }
    public function store(Request $request)
    {
        // Session::put('screen', 2);
        try {
            $rules = [
                'full_name' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([ 'status' => false,'message' => $validator->errors()->first()], 402);
            }
            if(!$request->checkbox){
                return response()->json([ 'status' => false,'message' => 'Please accept the terms.Please check box'], 402);
            }
            $session = Session::get('captcha');

            if(!$session || strcmp($session,$request->captcha) !=0){
                return response()->json([ 'status' => false,'message' => 'Captcha Invalid'], 402);
            }
               // lưu vào db
               $datetime = Carbon::now();
               $info_visa = InfoPaymentVisa::create([
                'code' => 'VS'.Utils::getRandom(4).$datetime->format('YmdHis'),
                'full_name' => $request->full_name ?? 'nguyễn duy tú',
                'passport_data_page_image' => $request->image_passport ?? '/images/ho-chieu-tre-em-passport-tre-em-2022.jpg',
                'portrait_photography' => $request->image_avatar ?? '/images/z3661741009497_f2c8a815234ecad0739d9a87849b5f44.jpg',
                'birthday' =>  '2023-05-12',//$request->birthday ? date('Y-m-d',strtotime($request->birthday)) : null,
                'nationality' => $request->nationality ?? 'AUT',
                'nationality_at_birth' => $request->nationality_at_birth ?? '2023-02-15',
                'sex' => $request->sex ??1,
                'religion' => $request->religion ?? 'không',
                'occupation' => $request->occupation ?? 'nhân viên',
                'permanent_residential_address' => $request->permanent_residential_address ?? 'hà nội',
                'phone' => $request->phone ?? '0366961008',
                'email' => $request->email ?? 'tund@dxmb.vn',
                'passport_number' => $request->passport_number ?? '3462934788',
                'passport_type' => $request->passport_type ?? 'CV',
                'amount' => $request->amount,
                'expiry_date' => '2023-12-12', //$request->expiry_date ? date('Y-m-d',strtotime($request->expiry_date)) : null,
                // 'intended_length_of_stay_in_vn ' => $request->intended_length_of_stay_in_vn,
                'intended_date_of_entry'=> '2024-12-12', //$request->intended_date_of_entry ? date('Y-m-d',strtotime($request->intended_date_of_entry)) : null,
                'purpose_of_entry' => $request->purpose_of_entry ??78,
                'city_province' => $request->city_province ?? 821,
                'intended_temporaty_residential_address_in_vn' => $request->intended_temporaty_residential_address_in_vn ?? 'hà nội',
                'name_hosting_organisation'=>$request->name_hosting_organisation ?? 'công ty trách nhiệm 1 thành viên',
                'address' => $request->address ?? 'hà nội',
                'children_14_years_old' => $request->list_child_items ?? "{fullname_child: 'nguyễn duy tú', sex_child: '1', birthday_child: '08/03/2023', image_avatar_child: '/images/z3661741009497_f2c8a815234ecad0739d9a87849b5f44.jpg'}",
                'grant_visa_valid_from' =>'2023-12-24', //$request->grant_visa_valid_from ? date('Y-m-d',strtotime($request->grant_visa_valid_from)) : null,
                'grant_visa_valid_to' =>'2024-12-12',// $request->grant_visa_valid_to ? date('Y-m-d',strtotime($request->grant_visa_valid_to)) : null,
                'alowed_to_entry_throuth_checkpoint' => $request->alowed_to_entry_throuth_checkpoint ?? 'KLB',
                'exit_throuth_checkpoint'=>  $request->exit_throuth_checkpoint ?? 'SVD',
               ]);
                $info_visa->passport_type = Utils::passport_type[$info_visa->passport_type];
                $info_visa->city_province = Utils::city_province[$info_visa->city_province];
                $info_visa->nationality = Utils::current_nationality[$info_visa->nationality];
                $info_visa->exit_throuth_checkpoint = Utils::entry_through_checkpoint[$info_visa->exit_throuth_checkpoint];
                $info_visa->purpose_of_entry = Utils::purpose_of_entry[$info_visa->purpose_of_entry];
                $info_visa->alowed_to_entry_throuth_checkpoint = Utils::entry_through_checkpoint[$info_visa->alowed_to_entry_throuth_checkpoint];
                dBug::trackingInfo($info_visa);
                return response()->json(['status' => true, 'message' => 'insert data success.', 'data' => $info_visa], 200);
        } catch (\Exception $th) {
           // chưa có chỗ để lưu
           return response()->json([ 'status' => false,'message' => 'insert data error.'.$th->getMessage().$th->getLine()], 402);
        }

    }
    public function payment(Request $request)
    {
        // Session::put('screen', 1);
        $info_visa = InfoPaymentVisa::where('code',(string)$request->bankCustomer)->first();
        if(!$info_visa){
            return response()->json([ 'status' => false,'message' => 'customer invalid'], 402);
        }
        $info_bank = null;
        if($request->bankCode){
           $info_bank = json_decode($request->bankCode);
        }

        $data=[
            'orderCode' => $info_visa->code,
            'customMerchantId' => Str::uuid()->toString(),
            'amount' => $request->amount,
            'currency' => 'VND',
            'orderDescription' => 'E Visa',
            'totalItem' => 1,
            'checkoutType' =>(int)$request->checkoutType,
            'installment' => false,
            // 'bankCode' => @$info_bank->bankCode,
            // 'paymentMethod' => @$info_bank->methodCode,
            'cancelUrl' =>((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'].config('aleypay.live.callbackUrl'),
            'returnUrl' =>((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'].config('aleypay.live.callbackUrl'),
            'buyerName' => $info_visa->full_name,
            'buyerEmail' => $info_visa->email,
            'buyerPhone' => $info_visa->phone,
            'buyerAddress' => $info_visa->address,
            'buyerCity' => Utils::city_province[$info_visa->city_province],
            'buyerCountry' => 'Việt Nam',
            'paymentHours' => 48,
            'language' => 'vi'
        ];
        if((int)$request->checkoutType == 2){  // thanh toán trả góp
            $data['month'] = 0;
            $data['allowDomestic'] = false;
        }else{                                // thanh toán thường
            $data['allowDomestic'] = true;
        }
        // send notify email admin
        $list_mail = config('mail.email_admin');
        $list_mail[] = $info_visa->email;
        $details=[
            "email"=>$list_mail,
            "subject" => "Giao dịch đăng ký visa",
            "email_name"=> " Hệ thống VisaTravel",
            "template"=> 'form_notify_admin', // 'form_notify_admin' 'form_notify_payment_customer'
            "code_payment"=>$info_visa->code,
            "email_customer"=>$info_visa->email,
            "phone_customer"=>$info_visa->phone,
            "address_customer"=>$info_visa->address,
            "amount_customer"=> number_format($request->amount)
        ];
        //dispatch(new SendEmailJob($details));
        // send notify telegram admin
        dBug::trackingInfo($details);
        // send notify email customer
        $result = $this->sendOrderV3($data);
        transactionPayment::create([
         'info_payment_id'=>$info_visa->id,
         'code'=>$result->code,
         'amount'=>$request->amount,
         'transaction_code'=>$result->transactionCode,
         'message'=>$result->message
        ]);
        return response()->json(['status' => true, 'message' => 'insert data success.', 'data' => $result], 200);
    }
    private function convertUsdToVnd()
    {
		$url = 'https://api.apilayer.com/exchangerates_data/convert?to=VND&from=USD&amount=1';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'apikey: 3iBrutOMZ5E6kgDMprCEnzVb97iiV0gi'
        ));
        $result = curl_exec($ch);
        $returned_data = json_decode($result);
        return $returned_data;
    }
    private function sendOrderV3($data)
    {
        $data['tokenKey'] = config('aleypay.live.apiKey');
        $checksumKey = config('aleypay.live.checksumKey');
        $data['returnUrl'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http"). "://". @$_SERVER['HTTP_HOST'].config('aleypay.live.callbackUrl');
        $signature =  AlepayUtils::makeSignature_v2($data, $checksumKey);
        $data['signature'] = $signature;
        $data_string = json_encode($data);
		$url = config('aleypay.live.domain').'/request-payment';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        $result = curl_exec($ch);
        return json_decode($result);
    }
}
