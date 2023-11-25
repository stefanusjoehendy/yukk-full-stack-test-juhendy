<?php

namespace App\Services\Transaction;

use App\Models\Mst_Transtype;
use LaravelEasyRepository\Service;
use App\Repositories\Transaction\TransactionRepository;
use App\Services\MstTranstype\MstTranstypeServiceImplement;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TransactionServiceImplement extends Service implements TransactionService{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $MstTranstypeServiceImplement;

    use ResponseApi;

    public function __construct(TransactionRepository $mainRepository, MstTranstypeServiceImplement $MstTranstypeServiceImplement)
    {
      $this->mainRepository = $mainRepository;
      $this->MstTranstypeServiceImplement = $MstTranstypeServiceImplement;
    }

    public function getLastTransaction(Collection $data)
    {
        try{
            $last_transaction = $this->mainRepository->getLastTransaction($data);
            return $last_transaction;            
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    public function getTotalSaldo()
    {
        try{
            $total_saldo = $this->mainRepository->getTotalSaldo();
            return $total_saldo;            
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getMutationTransaction(Collection $filter){
        try{
            $data = [
                "recordsTotal" => $this->mainRepository->getMutationTransaction($filter)[1],
                "recordsFiltered" => $this->mainRepository->getMutationTransaction($filter)[1],
                'data' => $this->mainRepository->getMutationTransaction($filter)[0]
            ];
            return $data;
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createTransaction(Collection $data)
    {
        try{
            $lastBalance = 0;
            $lastTransaction = $this->getLastTransaction($data);

            if ( $data['trans_code'] == "TROT" ){
                if (empty($lastTransaction)){
                    return $this->error("You have to top up first", 404);
                }
                else if($data['nominal'] > $lastTransaction->balance){
                    return $this->error("Balance not enough for this transaction, please top up", 404);
                }
                else{
                    $data['nominal'] = $data['nominal'] * -1;
                }
            }
            else{
                if ( $data['file_attachement'] == "" ){
                    return $this->error("For top up transaction required upload attachment", 404);
                }
            }
            
            $lastBalance = empty($lastTransaction) ? 0 : $lastTransaction->balance;

            $ref_id = $this->MstTranstypeServiceImplement->getRefID($data['trans_code']);
            
            $data['ref_id'] = $ref_id;
            $data['current'] = $lastBalance;
            $data['balance'] = $lastBalance + $data['nominal'];

            if ( $data['file_attachement'] != ''){
                $file_ext = pathinfo($data['file_attachement'], PATHINFO_EXTENSION);
                $data['file_attachement'] = $ref_id.'.'.$file_ext;
            }
            
            $input_id = $this->mainRepository->createTransaction($data);

            if ($input_id != 0) {
                $this->MstTranstypeServiceImplement->updateTransTypeLastNo($data['trans_code']);
            }

            return $this->success(
                "Success",
                $ref_id, 
                200
            );
        }
        catch(Exception $exception){
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
