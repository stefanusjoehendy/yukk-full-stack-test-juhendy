<?php

namespace App\Repositories\MstTranstype;

use LaravelEasyRepository\Repository;

interface MstTranstypeRepository extends Repository{

    public function getRefID(string $trans_code);

    public function updateTransTypeLastNo(string $trans_code);
}
