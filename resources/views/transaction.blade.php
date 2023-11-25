@extends('layout.base')

@section('title', 'Transaction')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaction</h1>
            </div>
        </div>
    </div>
</section>

<div class='content'>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-6 col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input</h3>
                    </div>
                    
                    
                    <form id="form_trans">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Transaction Type<code>*</code></label>
                                <select class="trans_type form-control" id="trans_type" name="trans_type"></select>
                                <span class="form-text text-muted"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date<code>*</code></label>
                                <input type="text" class="form-control trans_date" id="trans_date" name="trans_date" placeholder="date" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea class="form-control trans_desc" id="trans_desc" name="trans_desc" rows="3" placeholder="Your Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Amount<code>*</code></label>
                                <input type="text" class="form-control trans_amt" id="trans_amt" name="trans_amt" placeholder="Amount">
                            </div>
                            <div class="form-group">
                                <label for="trans_attch">Attachment</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input trans_attch" id="trans_attch" name="trans_attch">
                                        <input type="text" class="form-control file_attch" id="file_attch" name="file_attch" hidden>
                                        <label class="custom-file-label" for="trans_attch">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary btn_submit" id="btn_submit" name="btn_submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('path_page_js', 'resources/js/transaction.js' )