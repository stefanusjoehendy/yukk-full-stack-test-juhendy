@extends('layout.base')

@section('title', 'Mutation')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mutation</h1>
            </div>
        </div>
    </div>
</section>

<div class='content'>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-6 col-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                    </div>
                    
                    
                    <form id="form_trans">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Transaction Type</label>
                                    <select class="trans_type form-control" id="trans_type" name="trans_type"></select>
                                    <span class="form-text text-muted"></span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="exampleInputPassword1">Description</label>
                                    <input type="text" class="form-control trans_desc" id="trans_desc" name="trans_desc" placeholder="Description"></input>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary btn_filter" id="btn_filter" name="btn_filter">Filter</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-3 col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 class="total_saldo" id="total_saldo"></h3>
                        <p>TOTAL BALANCE</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 table-management">
            <table style="width:100%" class="table table-striped- table-bordered table-hover" id="datatable_ajax_mutation">
                <thead class="" style="background-color:#75ff98;">
                    <tr>
                        <th>Ref ID</th>
                        <th>Date</th>
                        <th>transaction Type</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('path_page_js', 'resources/js/mutation.js' )