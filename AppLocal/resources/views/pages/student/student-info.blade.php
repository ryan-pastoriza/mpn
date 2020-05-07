{{-- Student Search --}}
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-cyan">
                <h2>
                    Search
                </h2>
            </div>
            <div class="body">
                <form class="custom-search">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <label id="l_student_name" class="form-label">Student</label>
                            <input list="name" type="text" class="form-control" name="student_name" id="student_name" placeholder="Search...">
                            <datalist id="name">
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label id="l_student_year" class="form-label">School Year</label>
                            <input list="year" type="text" class="form-control" name="student_year" id="student_year" placeholder="School Year">
                            <datalist id="year">
                            <?php
                                $startingYear = date('Y') - 20;
                                $endingYear = date('Y');
                                for ($i = $startingYear;$i <= $endingYear;$i++)
                                {
                                    echo '<option data-id="'.$i.'-'.($i+1).'" value="'.$i.'-'.($i+1).'"></option>';
                                }
                            ?>
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label id="l_student_semester" class="form-label">Semester</label>
                            <input list="semester" type="text" class="form-control" name="student_semester" id="student_semester" placeholder="Semester">
                            <datalist id="semester">
                                <option data-id="1" value="1st semester" class="form-control"></option>
                                <option data-id="2" value="2nd semester" class="form-control"></option>
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label id="l_student_term" class="form-label">Term</label>
                            <input list="term" type="text" class="form-control" name="student_term" id="student_term" placeholder="Term">
                            <datalist id="term">
                                <option data-id="1" value="Prelim" class="form-control"></option>
                                <option data-id="2" value="Midterm" class="form-control"></option>
                                <option data-id="3" value="Pre Final" class="form-control"></option>
                                <option data-id="4" value="Final" class="form-control"></option>
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <label id="btn_search_student" class="form-label" ></label>
                            <button id="btn_search_student" name="btn_search_student" type="button" class="btn bg-cyan waves-effect form-control">
                                <i class="material-icons">search</i>
                                <span>SEARCH</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- #END# Student Search --}}

{{-- Promissory Notes and Records | With Floating Label --}}
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Promissory Note Records
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li>
                        <a href="javascript:void(0);" id="reload-content-records" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                            <i class="material-icons">loop</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="body" style="padding: 0px; margin: 0px;">
                <div class="card">
                    <div class="row">
                        {{-- Student Information | With Floating Label --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            {{-- <div class="card"> --}}
                                <div class="header">
                                    <h2>
                                        Student Information
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" id="reload-content-student" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form>
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_fullname" class="form-control" value=" " readonly>
                                                        <label class="form-label Floating">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_gender" class="form-control" value=" " readonly>
                                                        <label class="form-label">Gender</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_birthdate" class="form-control" value=" " readonly>
                                                        <label class="form-label Floating">Birth Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_civ_status" class="form-control" value=" " readonly>
                                                        <label class="form-label">Civil Status</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_birthplace" class="form-control" value=" " readonly>
                                                        <label class="form-label">Birth Place</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_religion" class="form-control" value=" " readonly>
                                                        <label class="form-label">Religion</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_weight" class="form-control" value=" " readonly>
                                                        <label class="form-label Floating">Weight</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_height" class="form-control" value=" " readonly>
                                                        <label class="form-label">Height</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_blood_type" class="form-control" value=" " readonly>
                                                        <label class="form-label">blood type</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            {{-- </div> --}}
                        </div>
                        {{-- #END# Student Information | With Floating Label --}}

                        {{-- Parent Guardian Information | With Floating Label --}}
                        <div class="col-lg-6 col-lg-6l-md-6 col-sm-6">
                            {{-- <div class="card"> --}}
                                <div class="header">
                                    <h2>
                                        Parent/Guardian
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" id="reload-content-guardian" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form>
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <span id="id_presented"><img id="presented_valid_id" src="images/admin-logo-grey.png" width="120" height="120" style="border:2px;border-color: black;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-line">
                                                        <input type="text" id="g_fullname" class="form-control" value=" " readonly>
                                                        <label class="form-label">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="g_relation" class="form-control" value=" " readonly>
                                                        <label class="form-label">Relation</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="g_address" class="form-control" value=" " readonly>
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="g_email" class="form-control" value=" " readonly>
                                                        <label class="form-label">Email</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-line">
                                                        <input type="text" id="g_contact" class="form-control" value=" " readonly>
                                                        <label class="form-label">Contact Number</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            {{-- </div> --}}
                        </div>
                        {{-- #END# Parent Guardian Information | With Floating Label --}}
                    </div>
                </div>
                <div class="card">
                    <div class="row">
                       {{-- Promissory Record | With Floating Label --}}
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            {{-- <div class="card"> --}}
                                <div class="header">
                                    <h2>
                                        Promissory Record <span class="label label-circle bg-green">Status</span>
                                    </h2>
                                    <ul class="header-dropdown m-r--5">
                                        <li>
                                            <a href="javascript:void(0);" id="reload-content-guardian" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                <i class="material-icons">loop</i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="body">
                                    <form>
                                        <div class="form-group form-float">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_pn_date_filed" class="form-control" value=" " readonly>
                                                        <label class="form-label">Date Filed</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_pn_date_promised" class="form-control" value=" " readonly>
                                                        <label class="form-label">Date Promised</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_pn_amount_promised" class="form-control" value=" " readonly>
                                                        <label class="form-label Floating">Amount Promised In Digit</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_pn_amount_promised_words" class="form-control" value=" " readonly>
                                                        <label class="form-label Floating">Amount Promised In Words</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-line">
                                                        <input type="text" id="stud_pn_remarks" class="form-control" value=" " readonly>
                                                        <label class="form-label">Remarks</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            {{-- </div> --}}
                        </div>
                        {{-- #END# Promissory Record | With Floating Label --}}
                        {{-- Assessment | With Floating Label --}}
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            {{-- <div class="card"> --}}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="header">
                                            <h2>
                                                Assessment
                                            </h2>
                                            <ul class="header-dropdown m-r--5">
                                                <li>
                                                    <a href="javascript:void(0);" id="reload-content-payment" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                        <i class="material-icons">loop</i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <form>
                                                <div class="form-group form-float">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-line">
                                                                <input type="text" id="assess_prelim" class="form-control" value=" " readonly>
                                                                <label class="form-label Floating">Prelim</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-line">
                                                                <input type="text" id="assess_midterm" class="form-control" value=" " readonly>
                                                                <label class="form-label">Midterm</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-line">
                                                                <input type="text" id="assess_prefi" class="form-control" value=" " readonly>
                                                                <label class="form-label">Pre Final</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-line">
                                                                <input type="text" id="assess_final" class="form-control" value=" " readonly>
                                                                <label class="form-label">Final</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-line">
                                                                <input type="text" id="assess_total_bill" class="form-control" value=" " readonly>   
                                                                <label class="form-label Floating">Total Assessment</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- #END# Assessment | With Floating Label --}}
                            {{-- </div> --}}
                            <div class="col-lg-12 col-md-12 col-sm-12">
                               {{-- Old Accounts| With Floating Label --}}
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="header">
                                            <h2>
                                                Old Accounts
                                            </h2>
                                            <ul class="header-dropdown m-r--5">
                                                <li>
                                                    <a href="javascript:void(0);" id="reload-content-payment" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="lightBlue" hidden="">
                                                        <i class="material-icons">loop</i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <form>
                                                <div class="form-group form-float">
                                                    <div id="old_accounts"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- #END# Old Accounts | With Floating Label --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 {{-- #END# Promissory Notes and Records | With Floating Label  --}}