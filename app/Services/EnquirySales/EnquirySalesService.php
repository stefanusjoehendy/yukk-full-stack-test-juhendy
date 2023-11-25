<?php

namespace App\Services\EnquirySales;

use Illuminate\Support\Collection;
use LaravelEasyRepository\BaseService;

interface EnquirySalesService extends BaseService{

    public function insertEnquiry(Collection $data);
}
