<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Transaction\TransactionService;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    use ResponseApi;

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function validasiInputData(Request $data){
        $rules = [
            'user_id'                   => 'required',
            'trans_code'                => 'required',
            'trans_date'                => 'required',
            'nominal'                   => 'required|numeric|min:1',
        ];

        $message = [
            'user_id.required'          => 'Please input user_id',
            'trans_code.required'       => 'Please input trans_code',
            'trans_date.required'       => 'Please input trans_date',
            'nominal.min'               => 'Please input nominal bigger then zero',
        ];

        
        $validator = Validator::make(
            $data->all()['data'],
            $rules,
            $message
        );

        return [
            'error_status' => $validator->fails(),
            'error_message' => $validator->errors()->first()
        ];
    }


    public function store (
        Request $request
    )
    {
        try{
            $valid = $this->validasiInputData($request);
            if ($valid['error_status']){
                return $this->error($valid['error_message'], 404);
            }
            
            $response = $this->transactionService->createTransaction(collect($request->all()['data']));
            return $response;
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }

    public function index ()
    {
        try{            
            $response = $this->transactionService->getTotalSaldo();
            return $response;
        }
        catch(Exception $exception){
            return \response()->json(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
