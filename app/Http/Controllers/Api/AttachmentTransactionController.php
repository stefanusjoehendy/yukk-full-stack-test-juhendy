<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Http\Request;

class AttachmentTransactionController extends Controller
{
    use ResponseApi;

    public function store(Request $request)
    {
        try {
            $fileName = $request->refid;
            $path = 'images/topup/';
            $fileExt = pathinfo($request->upload_name, PATHINFO_EXTENSION);
            if (!file_exists($path))
            {
                mkdir($path, 0775, true);
            }
            $request->fileattch->move(public_path($path), $fileName.'.'.$fileExt);

            return $this->success(
                "Success",
                "Upload DONE", 
                200
            );
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
