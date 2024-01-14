<div class="modal fade" id="CreateModal">
    <div class="modal-dialog modal-xxl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><i class="fas fa-graduation-cap"></i>History Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">

                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>


                {{-- 'route' => 'users.store', --}}
                {!! Form::open(['method' => 'POST', 'class' => 'form', 'id' => 'myForm']) !!}

                <div class="card card-success card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">Student Detail</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i> Centre Code:</strong>
                                                    <select style="width: 100%;"
                                                        class="productl select2 select2_single form-control"
                                                        id="AddCentre" name="centre" multiple="multiple"
                                                        @cannot('all-centre') disabled @endcannot>
                                                        <!-- <option value="" selected>Select Student</option>
                                                                                                                                                                                                                                                                                                                                                                                                    <option value="" selected>Select Parent</option>-->
                                                        @foreach ($centre as $key2)
                                                            <option value="{{ $key2->id }}"
                                                                @if (Auth::user()->department->id == (int) $key2->id) selected @endif>
                                                                {{-- {{ $key2->code }} --}}
                                                                {{ $key2->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            {{-- ต่อหน้า create view history --}}
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i> Student No.</strong>
                                                    {{-- {!! Form::text('code', null, [
                                                        'id' => 'AddCode',
                                                        'placeholder' => 'Code',
                                                        'class' => 'form-control',
                                                        'readonly' => true,
                                                    ]) !!} --}}
                                                    <select name="student" id="s_student"class="select2 select2_single form-control s_student"
                                                        multiple="multiple">
                                                        <option value="">select student</option>

                                                    </select>
                                                    {{-- <input type="text" placeholder="Code" class="form-control" id="AddCode" name="code" readonly="ture"> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i> Level</strong>
                                                    {{-- <select style="width: 100%;" class="select2 select2_single form-control" id="AddLevel"  name="level" multiple="multiple"> --}}
                                                    <select name="level_id" id="AddLevel" class="level_id select2 select2_single form-control" multiple="multiple">
                                                        <option value="">Select Level</option>

                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>

                                                    </select>
                                                </div>
                                            </div>
                                            {{-- ต่อหน้า create view history --}}
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i>Term</strong>
                                                    <select name="term"
                                                        id="AddTerm"class="terms select2 select2_single form-control"
                                                        multiple="multiple">
                                                        <option value="">select Term</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i> Bookuse</strong>
                                                    {{-- <select style="width: 100%;"
                                                        class="books select2 select2_single form-control" id="AddBook"
                                                        name="bookuse" multiple="multiple"
                                                        @cannot('all-centre') disabled @endcannot>
                                                        <option value="">Select Book</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>

                                                    </select> --}}
                                                    <input type="text" class="form-control" id="AddBook" name="bookuse" placeholder="pls Enter book for student">
                                                </div>
                                            </div>
                                            {{-- ต่อหน้า create view history --}}
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i>Course Remaining</strong>
                                                    <input type="text" name="course_remaining"
                                                        id="AddCourseRemaining" disabled class="form-control">

                                                    {{-- <select name="course_remaining" id="AddCourseRemaining"class="select2 select2_single form-control"
                                                    multiple="multiple">
                                                        <option value="">select student</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-calendar"></i> Date:</strong>
                                                    <input type="text" name="date" id="AddDate"
                                                        class="AddDate form-control" data-target="#reservationdate"
                                                        autocomplete="off">
                                                    {{-- {!! Form::text('date', null, [
                                                        'id' => 'AddDate',
                                                        'placeholder' => '',
                                                        'class' => 'AddDate form-control',
                                                        'data-target' => '#reservationdate',
                                                    ]) !!} --}}
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <strong><i class="fas fa-calendar"></i> Start Time:</strong>

                                                                <div class="row">
                                                                    <input type="text" id="AddStartTime"
                                                                        class="form-control col-sm-10 timepicker">
                                                                    <span class="input-group-text input-group-addon">
                                                                        <i class="fa fa-clock"></i>
                                                                    </span>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">

                                                        <div class="form-group">
                                                            <strong><i class="fas fa-calendar"></i> End Time:</strong>
                                                            <div class="row">
                                                                <input type="text" id="AddEndTime"
                                                                    class="form-control col-sm-10 timepicker">
                                                                <span class="input-group-text input-group-addon">
                                                                    <i class="fa fa-clock"></i>
                                                                </span>
                                                            </div>

                                                            {{-- <input id="" type="text" class="form-control timepicker"/> --}}


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-calendar"></i> Signature:</strong>
                                                    <textarea name="signature" id="AddSignature" rows="5" class="form-control"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-calendar"></i> Comment:</strong>
                                                    <textarea name="comment" id="AddComment" rows="5" class="form-control"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row form-focus" id="dropzone-att">
                                            <div class="col-md-12 col-sm-12">
                                                <a id="datt"></a>
                                                <div class="position-relative form-group">
                                                    <label class="form-label form-label-top form-label-auto"
                                                        for="att">รูปนักเรียน<span
                                                            class="form-required">*</span>
                                                        <div style="width: 280px"></div>
                                                    </label>
                                                    <input type="text" id="drop2" name="drop2"
                                                        class="form-control form_none" value="" required>
                                                    <div class="dropzone" id="my-awesome-dropzone2"
                                                        style="font-size: 1.5em;">
                                                        <div class="fallback">

                                                        </div>
                                                    </div>
                                                    <label class="form-sub-label" style="min-height:13px"
                                                        aria-hidden="false">Student Photo</label>
                                                    <div id="dropzone-att-error" class="form-error-message" role="alert">
                                                        <img src="https://cdn.jotfor.ms/images/exclamation-octagon.png"
                                                            height="10">
                                                        <span class="error-navigation-message">This field is
                                                            required.</span>
                                                        <div class="form-error-arrow">
                                                            <div class="form-error-arrow-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropzonex dz-default dz-message" id="dropzone_preview2"
                                            style="font-size: 1.5em;">
                                            <h3 class="dropzone-previews ui"></h3>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer {{-- justify-content-between --}}">
                <button type="button" class="btn btn-success" id="SubmitCreateForm"><i class="fas fa-download"></i>
                    Save </button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal"><i
                        class="fas fa-door-closed"></i> Close</button>
            </div>
        </div>
    </div>
</div>
