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
       
        dd('thành công');
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

}
