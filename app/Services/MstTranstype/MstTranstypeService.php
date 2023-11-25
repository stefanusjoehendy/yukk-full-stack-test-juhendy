<?php

namespace App\Services\MstTranstype;

use LaravelEasyRepository\BaseService;

interface MstTranstypeService extends BaseService{

    public function getRefID(string $trans_code);

    public function updateTransTypeLastNo(string $trans_code);
}
