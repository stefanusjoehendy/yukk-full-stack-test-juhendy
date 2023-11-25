<?php

namespace App\Repositories\Transaction;

use Illuminate\Support\Collection;
use LaravelEasyRepository\Repository;

interface TransactionRepository extends Repository{

    public function createTransaction(Collection $data);

    public function getLastTransaction(Collection $data);

    public function getTotalSaldo();

    public function getMutationTransaction(Collection $data);
}
