<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Integration;
use Illuminate\Support\Facades\Storage;

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
    public function storeIntegration(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048', // Only allow CSV files
        ]);

        // Store the uploaded file
        $file = $request->file('file');
        $filePath = $file->store('uploads');

        // Convert CSV to JSON
        $csvData = array_map('str_getcsv', file(Storage::path($filePath)));
        $headers = array_shift($csvData); // Extract headers
        $jsonData = [];

        foreach ($csvData as $row) {
            $jsonData[] = array_combine($headers, $row);
        }

        // Save the JSON data
        $jsonPath = str_replace('.csv', '.json', $filePath);
        Storage::put($jsonPath, json_encode($jsonData));

        // Save integration details in the database
        $integration = Integration::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
            'status' => 'converted',
        ]);

        return response()->json([
            'message' => 'CSV file uploaded and converted to JSON.',
            'integration' => $integration,
        ]);
    }
    public function getIntegrations()
    {
        $integrations = Integration::all();
        return response()->json($integrations);
    }

}
