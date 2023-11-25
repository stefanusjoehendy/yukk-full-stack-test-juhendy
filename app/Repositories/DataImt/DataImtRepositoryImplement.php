<?php

namespace App\Repositories\DataImt;

use App\Models\data_imt;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\DataImt;
use App\Traits\ResponseApi;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DataImtRepositoryImplement extends Eloquent implements DataImtRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    // Use ResponseAPI Trait in this repository
    use ResponseApi;

    public function __construct(data_imt $model)
    {
        $this->model = $model;
    }

    public function insertDataIMT(Collection $data)
    {
        DB::beginTransaction();
        try{
            $input = array(
                'name'        => $data['name'],
                'phone'        => $data['phone'],
                'tinggi'        => $data['tinggi_badan'],
                'berat'        => $data['berat_badan'],
            );
            DB::table('data_imt')->insert($input);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function updateDataIMT(Collection $data, int $id)
    {
        DB::beginTransaction();
        try{
            $input = array(
                'name'        => $data['name'],
                'phone'        => $data['phone'],
                'tinggi'        => $data['tinggi_badan'],
                'berat'        => $data['berat_badan'],
            );
            
            DB::table('data_imt')->where('id', 1)->update($input);
            DB::commit();
        }
        catch(\Exception $e){
            
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}
