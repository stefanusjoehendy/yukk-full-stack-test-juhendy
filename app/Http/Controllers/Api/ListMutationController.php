<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Transaction\TransactionService;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Http\Request;

class ListMutationController extends Controller
{
    use ResponseApi;

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function store (
        Request $request
    )
    {
        try{            
            $response = $this->transactionService->getMutationTransaction(collect($request->all()));
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
