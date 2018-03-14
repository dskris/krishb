<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TutorialController extends Controller
{
    public function index()
    {
        return view('tutorial.upload_image_profile');
    }

    public function postUploadImageFile(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'file' => 'image',
            ],
            [
                'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
            ]);
        if ($validator->fails())
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        $extension = $request->file('file')->getClientOriginalExtension(); // getting image extension
        $dir = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('file')->move($dir, $filename);
        return $filename;
    }

    public function getRemoveImageFile($filename)
    {
        File::delete('uploads/' . $filename);
    }
}