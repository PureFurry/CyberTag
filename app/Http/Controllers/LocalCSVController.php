<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalCSVController extends Controller
{
    public function localcsv(Request $request){
        return view("localcsv");
    }
    // Verify file existence
    public function verifyFile(Request $request)
    {
        $request->validate([
            'file_path' => 'required|string',
        ]);

        $filePath = $request->input('file_path');

        if (file_exists($filePath)) {
            return response()->json(['message' => 'File verified successfully.', 'status' => true], 200);
        } else {
            return response()->json(['message' => 'File not found. Please check the path.', 'status' => false], 404);
        }
    }

    // Prepare integration
    public function createIntegration(Request $request)
    {
        $request->validate([
            'file_path' => 'required|string',
        ]);

        $filePath = $request->input('file_path');

        if (file_exists($filePath)) {
            // Process the file for integration
            // Example: Read file contents or move it to a specific folder
            $fileContents = file_get_contents($filePath);

            // Do your integration logic here...

            return response()->json(['message' => 'Integration created successfully.', 'status' => true], 200);
        } else {
            return response()->json(['message' => 'File not found. Cannot create integration.', 'status' => false], 404);
        }
    }
}
