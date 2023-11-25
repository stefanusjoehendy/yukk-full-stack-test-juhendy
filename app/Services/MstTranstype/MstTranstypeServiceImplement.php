<?php

namespace App\Services\MstTranstype;

use LaravelEasyRepository\Service;
use App\Repositories\MstTranstype\MstTranstypeRepository;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Facades\DB;

class MstTranstypeServiceImplement extends Service implements MstTranstypeService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

     use ResponseApi;

    public function __construct(MstTranstypeRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getRefID(string $trans_code)
    {
        try{
            $data_transtype = $this->mainRepository->getRefID($trans_code);
                                
            $text = $data_transtype->trans_code;
            $num = $data_transtype->lastno;

            return sprintf("%s%09d", $text, $num);
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateTransTypeLastNo(string $trans_code)
    {
        try{
            return $this->mainRepository->updateTransTypeLastNo($trans_code);
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
