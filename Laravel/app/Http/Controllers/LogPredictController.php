<?php

namespace App\Http\Controllers;

use App\Models\Log_predict;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogPredictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    private function uploadImg($request)
    {
    }

    public function index()
    {
        $log_predict = Log_predict::all();
        return response()->json([
            'status' => 'success',
            'data' => $log_predict
        ]);
    }

    public function predict(Request $request)
    {

        $request->validate(['file' => 'mimes:jpeg,jpg|required']);

        $image = new Log_predict;

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = time() . '-' . $imagePath->getClientOriginalName();

            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }
        $image->owner = Auth::id();
        $image->path = '/storage/' . $path;
        $image->save();

        $newPath = url('storage/' . $path);


        return response()->json([
            'status' => 'success',
            // 'results' => $response,
            'image' => $newPath,
        ]);
    }
}
