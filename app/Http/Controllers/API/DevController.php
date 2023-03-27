<?php

namespace App\Http\Controllers\API;

use DB;
use App\Category;
use App\Helpers\Lib\Utils\AlepayUtils;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        $details=[
            "email"=>"tund@dxmb.vn",
            "subject" => "Giao dịch đăng ký visa",
            "email_name"=> " Hệ thống VisaTravel",
            "template"=> 'form_notify_admin', // 'form_notify_admin' 'form_notify_payment_customer'
            "code_payment"=>'dsfsdf',
            "email_customer"=>'tund@dxmb.vn',
            "phone_customer"=>'0366961008',
            "address_customer"=> 'ha noi',
            "amount_customer"=> number_format(5000000)
        ];
        dispatch(new SendEmailJob($details));
        dd('Nguyễn duy tú');
        //dd(config('aleypay.sandbox.apiKey'));
        // $data['tokenKey'] = 'mz7yS4yVognq5UsUlbJq8vWXc9KwEB';
        // $checksumKey = 's7UlvRCqTieXyA9UXoo2R9IJQ4W62p';
        // $signature =  AlepayUtils::makeSignature_v2($data, $checksumKey);
        // $data['signature'] = $signature;
        // $data_string = json_encode($data);
		// $url = 'https://alepay-v3.nganluong.vn/api/v3/checkout/get-list-banks';
		// print_r($url);

        // $ch = curl_init($url);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Content-Length: ' . strlen($data_string)
        // ));

        // $result = curl_exec($ch);
        // dd($result);
        // $returned_data = json_decode($result);
        // return response()->json($returned_data, 200);
    }
    public function install_command(Request $request)
    {
        $time = $request->get("time", false);
        if(empty($request->command))
        {
            dd('chưa chuyền param query: command');
        }
        $command = $request->command;
        if($time) $command.=" ".$time;
        $dfg = Artisan::call($command);
        dd($dfg);
    }
    public function install_command_migrate(Request $request)
    {
        $dfg= Artisan::call('migrate',
        array(
          '--path' => 'database/migrations',
          '--force' => true));
        dd($dfg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|min:2',
            'slug'=>'required|min:2|unique:categories',
            'description'=>'nullable|string',
            'category_image'=>'nullable|mimes:jpeg,jpg,png|max:1024',
            'parent_id'=>'nullable',
            'is_menu'=>'nullable|numeric',
            'is_searchable'=>'nullable|numeric',
            'is_active'=>'nullable|numeric',
        ]);

        $category = new Category;
        $category->title = $request->title;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        // image upload
        $path = 'images/category/no-thumbnail.jpeg';
        if ($request->has('category_image')) {
            $extension = "." . $request->category_image->getClientOriginalExtension();
            $name = basename($request->category_image->getClientOriginalName(), $extension) . time();
            $name = $name . $extension;
            $path = $request->category_image->storeAs('images/category', $name, 'public');
        }
        $category->category_image = $path;
        $category->is_menu = $request->is_menu;
        $category->is_searchable = $request->is_searchable;
        $category->is_active = $request->is_active;
        $category->save();

        $category->parents()->attach($request->parent_id, ['created_at'=>now(), 'updated_at'=>now()]);
        return redirect(route('category.index'))->with(['message' => 'Category Added Successfully!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
         $categories = Category::where('id','!=', $category->id)->get();
         return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:2',
            'slug'=>'required|min:2|unique:categories,slug,'.$id,
            'description'=>'nullable|string',
            'category_image'=>'nullable|mimes:jpeg,jpg,png|max:1024',
            'parent_id'=>'nullable',
            'is_menu'=>'nullable|numeric',
            'is_searchable'=>'nullable|numeric',
            'is_active'=>'nullable|numeric',
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = Str::slug($request->slug);
        $category->description = $request->description;

        // image upload
        $path = 'images/category/no-thumbnail.jpeg';
        if ($request->has('category_image')) {
            Storage::delete($category->category_image);
            $extension = "." . $request->category_image->getClientOriginalExtension();
            $name = basename($request->category_image->getClientOriginalName(), $extension) . time();
            $name = $name . $extension;
            $path = $request->category_image->storeAs('images/category', $name, 'public');
        }
        $category->category_image = $path;
        $category->is_menu = $request->is_menu;
        $category->is_searchable = $request->is_searchable;
        $category->is_active = $request->is_active;

        // detach all parent categories
        $category->parents()->detach();
        //attach selected parent categories
        $category->parents()->attach($request->parent_id, ['created_at'=>now(), 'updated_at'=>now()]);

        //save current record into database
        $saved = $category->save();

        if ($saved) {
            return redirect(route('category.index'))->with(['message' => 'Category Successfully Updated!', 'alert-type' => 'success']);
        } else {
            return back()->with(['message' => 'Error Updating Category', 'alert-type' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // it's remove category_parent but not categories
        $childDelete = $category->childrens()->detach();
        Storage::delete($category->category_image);
        if ( $category->forceDelete()) {
            return back()->with(['message' => 'Category Successfully Deleted!', 'alert-type' => 'success']);
        } else {
            return back()->with(['message' => 'Error Deleting Record', 'alert-type' => 'error']);
        }
    }
    public  function generateCaptcha(){
        $captcha_code = '';
        $captcha_image_height = 50;
        $captcha_image_width = 130;
        $total_characters_on_image = 4;

//The characters that can be used in the CAPTCHA code.
//avoid all confusing characters and numbers (For example: l, 1 and i)
        $possible_captcha_letters = '23456789';
        $captcha_font = public_path('files/arial.ttf');

        $random_captcha_dots = 50;
        $random_captcha_lines = 25;
        $captcha_text_color = "0x142864";
        $captcha_noise_color = "0x142864";


        $count = 0;
        while ($count < $total_characters_on_image) {
            $captcha_code .= substr(
                $possible_captcha_letters,
                mt_rand(0, strlen($possible_captcha_letters)-1),
                1);
            $count++;
        }

        $captcha_font_size = $captcha_image_height * 0.65;
        $captcha_image = @imagecreate(
            $captcha_image_width,
            $captcha_image_height
        );

        /* setting the background, text and noise colours here */
        $background_color = imagecolorallocate(
            $captcha_image,
            255,
            255,
            255
        );

        $array_text_color = $this->hextorgb($captcha_text_color);
        $captcha_text_color = imagecolorallocate(
            $captcha_image,
            $array_text_color['red'],
            $array_text_color['green'],
            $array_text_color['blue']
        );

        $array_noise_color = $this->hextorgb($captcha_noise_color);
        $image_noise_color = imagecolorallocate(
            $captcha_image,
            $array_noise_color['red'],
            $array_noise_color['green'],
            $array_noise_color['blue']
        );

        /* Generate random dots in background of the captcha image */
        for( $count=0; $count<$random_captcha_dots; $count++ ) {
            imagefilledellipse(
                $captcha_image,
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                2,
                3,
                $image_noise_color
            );
        }

        /* Generate random lines in background of the captcha image */
        for( $count=0; $count<$random_captcha_lines; $count++ ) {
            imageline(
                $captcha_image,
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                mt_rand(0,$captcha_image_width),
                mt_rand(0,$captcha_image_height),
                $image_noise_color
            );
        }

        /* Create a text box and add 6 captcha letters code in it */
        $text_box = imagettfbbox(
            $captcha_font_size,
            0,
            $captcha_font,
            $captcha_code
        );
        $x = ($captcha_image_width - $text_box[4])/2;
        $y = ($captcha_image_height - $text_box[5])/2;
        imagettftext(
            $captcha_image,
            $captcha_font_size,
            0,
            $x,
            $y,
            $captcha_text_color,
            $captcha_font,
            $captcha_code
        );

        /* Show captcha image in the html page */
// defining the image type to be shown in browser widow
        header('Content-Type: image/jpeg');
        imagejpeg($captcha_image); //showing the image
        imagedestroy($captcha_image); //destroying the image instance
        $_SESSION['captcha'] = $captcha_code;
    }
    private function hextorgb($hexstring){
        $integar = hexdec($hexstring);
        return array("red" => 0xFF & ($integar >> 0x10),
            "green" => 0xFF & ($integar >> 0x8),
            "blue" => 0xFF & $integar);
    }

}
