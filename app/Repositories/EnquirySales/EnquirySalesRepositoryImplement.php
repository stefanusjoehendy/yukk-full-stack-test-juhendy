<?php
declare(strict_types=1);

namespace App\Repositories\EnquirySales;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\EnquirySales;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Traits\ResponseApi;
use Spatie\Activitylog\Models\Activity;

class EnquirySalesRepositoryImplement extends Eloquent implements EnquirySalesRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    // Use ResponseAPI Trait in this repository
    use ResponseApi;

    public function __construct(EnquirySales $model)
    {
        $this->model = $model;
    }

    public function validasiInputData(Collection $data){
        $rulesData = array(
            'nama'  => 'required'
        );

        // return Validator($data, $rulesData);
    }

    public function insertEnquiry(Collection $data)
    {
        DB::beginTransaction();
        try{
            $input = array(
                'sales_type'        => $data['sales_type'],
                'event_date'        => $data['event_date'],
                'event_time'        => $data['event_time'],
                'event_code'        => $data['event_code'],
                'title'             => $data['title'],
                'name'              => $data['name'],
                'email'             => $data['email'],
                'phone'             => $data['phone'],
                'budget'            => $data['budget'],
                'total_pax'         => $data['total_pax'],
                'special_request'   => $data['special_request'],
            );
            
            $input_id = DB::table('enquiry_sales')->insertGetId($input);
            DB::commit();

            Activity::all()->last();
            return $input_id;
            
        }
        catch(\Exception $e){
            
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
}