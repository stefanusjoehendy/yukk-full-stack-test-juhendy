<?php

namespace App\Services\DataImt;

use LaravelEasyRepository\Service;
use App\Repositories\DataImt\DataImtRepository;
use Illuminate\Support\Collection;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Traits\ResponseApi;

class DataImtServiceImplement extends Service implements DataImtService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(DataImtRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Use ResponseAPI Trait in this repository
    use ResponseApi;

    public function insertDataIMT(Collection $data){
      try {

        if ( $data['phone'] != '') {
            $this->mainRepository->insertDataIMT($data);
        }
        else {
            return $this->error('please input number', 404);
        }
        
      } catch (Exception $exception) {
        
          return $this->error($exception->getMessage(), $exception->getCode());
      }
    }

    public function updateDataIMT(Collection $data, int $id){
        try {
  
          if ( $data['phone'] != '') {
              $this->mainRepository->updateDataIMT($data, $id);
          }
          else {
              return $this->error('please input number', 404);
          }
          
        } catch (Exception $exception) {
          
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
