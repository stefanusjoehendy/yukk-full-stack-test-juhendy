<?php

namespace App\Repositories\DataImt;

use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface DataImtRepository extends Repository{

    public function insertDataIMT(Collection $data);
    public function updateDataIMT(Collection $data, int $id);
}
