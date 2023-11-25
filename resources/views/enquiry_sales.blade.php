<form id="form_sales" class="form_sales" name="form_sales">
    <div class="modal fade" id="modal_enquiry_wedding" style="display: none;" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl modal_enquiry_wedding">
            <div class="modal-content">
                <div class="modal-header modal-header--sticky">
                    <h3 class="col-11 modal-title text-center">SALES ENQUIRY</h3>
                    <button type="button" class="col-1 close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 section_header headercontact" id="headercontact">
                            <h4>CONTACT INFORMATION</h4>
                        </div>
                        <div class="form-group  col-lg-2 col-md-4 col-4">
                            <label for="enquiry_title">Title<code>*</code></label>
                            <select class="enquiry_title form-control" id="enquiry_title" name="enquiry_title">
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-md-8 col-12">
                            <label for="enquiry_fullname">Name<code>*</code></label>
                            <input type="text" class="form-control form-control-border border-width-2 enquiry_fullname" id="enquiry_fullname" name="enquiry_fullname" placeholder="Full Name">
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="enquiry_email">Email<code>*</code></label>
                            <input type="text" class="form-control form-control-border border-width-2 enquiry_email" id="enquiry_email" name="enquiry_email" placeholder="Your Email">
                        </div>
                        <div class="form-group col-lg-3 col-md-12 col-12">
                            <label for="enquiry_phone">Phone<code>*</code></label>
                            <div class="form group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">+62</i></span>
                                </div>
                                <input type="text" class="form-control form-control-border border-width-2 enquiry_phone" id="enquiry_phone" name="enquiry_phone" placeholder="1234">
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12 section_header information" id="information">
                            <h4>EVENT INFORMATION</h4>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-8">
                            <label for="enquiry_eventcode">Event<code>*</code></label>
                            <input type="text" class="form-control form-control-border border-width-2 enquiry_eventcode" id="enquiry_eventcode" name="enquiry_eventcode" placeholder="" disabled>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="sales_type">Event Type<code>*</code></label>
                            <select class="sales_type form-control" id="sales_type" name="sales_type"></select>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="enquiry_eventdate">Event Date<code>*</code></label>
                            <div class="input-group">
                                <input type="text" class="form-control enquiry_eventdate" id="enquiry_eventdate" name="enquiry_eventdate">
                                <span class="form-text text-muted"></span>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="enquiry_pax">Total Pax<code>*</code></label>
                            <div class="form group input-group">
                                <input type="text" class="form-control form-control-border border-width-2 enquiry_pax" id="enquiry_pax" name="enquiry_pax" placeholder="Your Pax">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">PAX</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="enquiry_budget">Range Budget<code>*</code></label>
                            <div class="form group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="">Rp</i></span>
                                </div>
                                <input type="text" class="form-control form-control-border border-width-2 enquiry_budget" id="enquiry_budget" name="enquiry_budget" placeholder="Your Budget">
                            </div>
                            <input type="text" class="form-control form-control-border border-width-2 enquiry_sliderbudget" id="enquiry_sliderbudget">
                        </div>
                        <div class="form-group col-lg-4 col-md-12 col-12">
                            <label for="enquiry_eventtime">Event Time<code>*</code></label>
                            {{-- <div class="input-group">
                                <input type="text" class="form-control enquiry_eventtime" id="enquiry_eventtime" name="enquiry_eventtime">
                                <span class="form-text text-muted"></span>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                </div>
                            </div> --}}
                            <div class="input-group date" id="enquiry_eventtime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#enquiry_eventtime"/>
                                <span class="form-text text-muted"></span>
                                <div class="input-group-append" data-target="#enquiry_eventtime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12 section_header information" id="information">
                            <h4>Special Request</h4>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-12">
                            <textarea class="form-control enquiry_request" id="enquiry_request" name="enquiry_request" rows="3" placeholder="Your Request"></textarea>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-12">
                            <div class="form-check">
                                <input class="form-check-input termcondition" id="termcondition" name="termcondition" type="checkbox">
                                <label for="termcondition" class="form-check-label">I have read and accepted the
                                    <a href="https://parador-hotels.com/privacy-policy" target="_blank" id="privacy_policy" style="font-weight: 500; text-decoration: underline;">privacy policy</a>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between modal-footer--sticky">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_enquiry_wedding">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>