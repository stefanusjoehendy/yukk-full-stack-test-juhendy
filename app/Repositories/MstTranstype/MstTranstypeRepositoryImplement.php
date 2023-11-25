<?php

namespace App\Repositories\MstTranstype;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Mst_Transtype;
use App\Traits\ResponseApi;
use Exception;
use Illuminate\Support\Facades\DB;

class MstTranstypeRepositoryImplement extends Eloquent implements MstTranstypeRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    use ResponseApi;

    public function __construct(Mst_Transtype $model)
    {
        $this->model = $model;
    }

    public function getRefID(string $trans_code)
    {
        DB::beginTransaction();
        try{
            $data_transtype = DB::table('mst_transtype')
                                ->select('trans_code', 'trans_name', 'lastno')
                                ->where('trans_code', '=', $trans_code)
                                ->first();
            DB::commit();
            return $data_transtype;
        }
        catch(Exception $e) {
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateTransTypeLastNo(string $trans_code)
    {
        try{
            return DB::transaction(function () use($trans_code) {
                Mst_Transtype::where('trans_code', $trans_code)->increment('lastno');
            });
        }
        catch(Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
