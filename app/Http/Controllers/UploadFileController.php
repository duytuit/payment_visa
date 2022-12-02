<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class UploadFileController extends Controller
{

     /**
     * allow FILE upload mime types
     */
    const FILE_MIME_TYPES = [
        'jpeg',
        'jpg',
        'gif',
        'png',
        'svg'
    ];
    public function upload(Request $request)
    {
        try {
            Validator::make($request->all(),[
                'attach_file'=>'required',
            ])->validate();

            if (!$request->hasFile('attach_file')) {
                return  response()->json(['success'=>false,'msg'=>'Phai upload 1 file'],404);
            }

            $files = $request->file('attach_file');
            $directory = 'images';
            if (!is_dir($directory)) {
                mkdir($directory);
            }
            $extension = $files->getClientOriginalExtension();
            $check = in_array(strtolower($extension), self::FILE_MIME_TYPES);
            if ($check) {
                $fileName = strtolower($files->getClientOriginalName());
                $files->move(public_path('images/'), $fileName);
                $urlFile = '/images/' . $fileName;
            } else {
                return  response()->json(['success' => false, 'msg' => 'File Không đúng định dạng jpeg, jpg, gif, png, svg,'], 404);
            }
            return  response()->json(['success' => true,'url'=>$urlFile, 'msg' => 'Upload file thanh cong'], 200);
        }
        catch (ValidationException $e) {
            $arrError = $e->errors(); // Useful method - thank you Laravel
            $messages = array();
            foreach ($arrError as $key=>$value ) {
                $messages[] = implode( ', ', $arrError[$key] );
            }
            $message = implode(', ', $messages);

            return  response()->json(['success'=>false,'msg'=>$message],404);

        }
        catch (Exception $exception) {
            return  response()->json(['success'=>false,'msg'=>$exception->getMessage()],404);
        }

    }
    public function reset_captcha(Request $request)
    {
        $captcha = '/captcha'.explode('captcha',captcha_src())[1] ;
        return  response()->json(['success'=>true,'message'=>$captcha],200);
    }
}
