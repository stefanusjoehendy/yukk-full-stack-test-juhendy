<?php

namespace App\Services\Transaction;

use Illuminate\Support\Collection;
use LaravelEasyRepository\BaseService;

interface TransactionService extends BaseService{

    public function createTransaction(Collection $data);

    public function getLastTransaction(Collection $data);

    public function getTotalSaldo();

    public function getMutationTransaction(Collection $filter);
}
