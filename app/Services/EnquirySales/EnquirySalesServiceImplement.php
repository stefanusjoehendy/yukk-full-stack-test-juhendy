<?php

namespace App\Services\EnquirySales;

use App\Mail\Enquiry_Sales;
use App\Mail\Enquiry_Sales_Admin;
use LaravelEasyRepository\Service;
use App\Repositories\EnquirySales\EnquirySalesRepository;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Traits\ResponseApi;

class EnquirySalesServiceImplement extends Service implements EnquirySalesService{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    // Use ResponseAPI Trait in this repository
    use ResponseApi;

    public function __construct(EnquirySalesRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function insertEnquiry(Collection $data){
        try {
            $input_id = $this->mainRepository->insertEnquiry($data);
            $email_Admin = 'Sales@parador-hotels.com';

            if ($input_id >= 0){
                $email = $data['email'];
                // * Email to Customer
                Mail::to($email)->send(new Enquiry_Sales($data));
                
                // * Email to Admins
                Mail::to($email_Admin)->send(new Enquiry_Sales_Admin($data));

                return $this->success(
                    "Success",
                    $input_id, 
                    200
                );
            }
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), $exception->getCode());
        }
    }
}
