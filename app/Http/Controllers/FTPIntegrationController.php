<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FTPIntegrationController extends Controller
{
    public function ftpintegration(Request $request){
        return view("ftpintegration");
    }
    //There must be upload with cybertag ftp
    public function upload_with_cybertag(Request $request){
        return view("upload_with_cybertag");
    }
    //There must be upload with own ftp
    public function upload_with_own(Request $request){
        return view("upload_with_own");
    }
    public function verifyFile(Request $request)
    {
        $filePath = $request->input('file_path');

        // Check if the file exists in the 'uploads' directory
        if (Storage::exists('uploads/' . $filePath)) {
            return response()->json(['message' => 'File verification successful!'], 200);
        } else {
            return response()->json(['message' => 'File not found. Please upload the file or check the file path.'], 404);
        }
    }

    public function createIntegration(Request $request)
    {
        $filePath = $request->input('file_path');

        // Ensure the file exists before proceeding
        if (!Storage::exists('uploads/' . $filePath)) {
            return response()->json(['message' => 'File not found. Cannot create integration.'], 404);
        }

        // Add your integration logic here
        // Example: Insert file details into the database
        // DB::table('integrations')->insert(['file_name' => $filePath]);

        return response()->json(['message' => 'Integration successfully created!'], 200);
    }
}
