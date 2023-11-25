<?php

namespace App\Repositories\EnquirySales;

use Illuminate\Support\Collection;
use LaravelEasyRepository\Repository;

interface EnquirySalesRepository extends Repository{

    public function insertEnquiry(Collection $data);
}
