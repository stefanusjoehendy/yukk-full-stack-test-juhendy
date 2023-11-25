<?php

namespace App\Repositories\Transaction;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Transaction;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class TransactionRepositoryImplement extends Eloquent implements TransactionRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    use ResponseApi;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function getLastTransaction(Collection $data)
    {
        DB::beginTransaction();
        try{
            $last_transaction = DB::table('transaction')
                                ->select('ref_id', 'current', 'balance')
                                ->where('user_id', '=', Auth::user()->user_id)
                                ->orderBy('trans_id', 'desc')
                                ->first();
            DB::commit();
            return $last_transaction;
        }
        catch(Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getTotalSaldo()
    {
        DB::beginTransaction();
        try{
            $last_transaction = DB::table('transaction')
                                ->select('nominal', 'user_id')
                                ->where('user_id', '=', Auth::user()->user_id)
                                ->sum('transaction.nominal');
            DB::commit();
            
            return $last_transaction;
        }
        catch(Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function getMutationTransaction(Collection $filter)
    {
        DB::beginTransaction();
        try{
            $query = DB::table('transaction')
                                ->join('users', 'users.user_id', '=', 'transaction.user_id')
                                ->join('mst_transtype', 'mst_transtype.trans_code', '=', 'transaction.trans_code')
                                ->select(   'transaction.trans_id', 
                                            'transaction.user_id', 
                                            'transaction.trans_code', 
                                            'transaction.trans_date', 
                                            'transaction.description', 
                                            'transaction.ref_id', 
                                            'transaction.current', 
                                            'transaction.nominal', 
                                            'transaction.balance', 
                                            'transaction.file_attachement',
                                            'users.name',
                                            'mst_transtype.trans_name'
                                        )
                                ->where('transaction.user_id', '=', Auth::user()->user_id)
                                ;
            if ( $filter['criteria']['trans_code'] != 'ALL'){
                $query->where('transaction.trans_code', '=', $filter['criteria']['trans_code'] );
            }

            if ( $filter['criteria']['description'] != ''){
                $query -> where('transaction.description', 'LIKE', "%{$filter['criteria']['description']}%" );
            }
            $query->orderBy('trans_id', 'asc');
            $query->skip($filter['start']);
            $query->limit($filter['length']);

            $list_mutation = $query->get();
            $count_mutation = $query->count();

            DB::commit();
            return [$list_mutation, $count_mutation] ;
        }
        catch(Exception $e) {
            
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function createTransaction(Collection $data)
    {
        DB::beginTransaction();
        try{
            $input= array(
                'user_id'           => Auth::user()->user_id,
                'trans_code'        => $data['trans_code'],
                'trans_date'        => $data['trans_date'],
                'description'       => $data['description'],
                'ref_id'            => $data['ref_id'],
                'current'           => $data['current'],
                'nominal'           => $data['nominal'],
                'balance'           => $data['balance'],
                'file_attachement'  => $data['file_attachement'],
            );
            
            $insert_id = DB::table('transaction')->insertGetId($input);
            DB::commit();

            return $insert_id;
        }
        catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
