<?php

namespace App\Services\DataImt;

use Illuminate\Support\Collection;
use LaravelEasyRepository\BaseService;

interface DataImtService extends BaseService{

    public function insertDataIMT(Collection $data);
    public function updateDataIMT(Collection $data, int $id);
}
