<div class="modal fade" id="CreateModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title"><div id="thead"><i class="fas fa-list-ol"></i> เพิ่ม Member</div></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>Something went wrong.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
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
                {!! Form::open(['method' => 'POST', 'class' => 'form']) !!}

                <div class="card card-success card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tabp" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">ข้อมูลผู้ติดต่อ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-address-tab" data-toggle="pill"
                                    href="#custom-tabs-one-address" role="tab"
                                    aria-controls="custom-tabs-one-address" aria-selected="false">ข้อมูลที่อยู่</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-one-profile" role="tab"
                                    aria-controls="custom-tabs-one-profile" aria-selected="false">ข้อมูลเบอร์ติดต่อ</a>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-user-tie"></i> คำนำหน้าชื่อ:</strong>
                                                    <select style="width: 100%;"
                                                        class="select2 form-control"
                                                        id="Addtname" name="Addtname">
                                                        <option value="">กรุณาเลือก</option>
                                                        <option value="คุณ">คุณ</option>
                                                        <option value="เด็กชาย">เด็กชาย</option>
                                                        <option value="เด็กหญิง">เด็กหญิง</option>
                                                        <option value="นาย">นาย</option>
                                                        <option value="นาง">นาง</option>
                                                        <option value="นางสาว">นางสาว</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-user-tie"></i> ชื่อ:</strong>
                                                    {!! Form::text('fname', null, ['id' => 'Addfname', 'placeholder' => 'ชื่อ', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-user-tie"></i> นามสกุล:</strong>
                                                    {!! Form::text('lname', null, ['id' => 'Addlname', 'placeholder' => 'นามสกุล', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-user-tie"></i> เพศ:</strong>
                                                    <select style="width: 100%;"
                                                        class="select2 form-control"
                                                        id="Addsex" name="Addsex">
                                                        <option value="">กรุณาเลือก</option>
                                                        <option value="ชาย">ชาย</option>
                                                        <option value="หญิง">หญิง</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-user-tie"></i> วันเกิด:</strong>
                                                    {!! Form::text('addbirthday', null, [
                                                        'id' => 'Addbirthday',
                                                        'data-age' => 'Addage',
                                                        'placeholder' => 'วันเกิด',
                                                        'class' => 'AddDate form-control',
                                                        'data-target' => '#reservationdate',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-address" role="tabpanel"
                                aria-labelledby="custom-tabs-one-address-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-home"></i> บ้านเลขที่:</strong>
                                                    {!! Form::text('homeno', null, [
                                                        'id' => 'Addhomeno',
                                                        'placeholder' => 'บ้านเลขที่',
                                                        'class' => 'form-control',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fa-solid fa-people-roof"></i> หมู่:</strong>
                                                    {!! Form::text('moo', null, [
                                                        'id' => 'Addmoo',
                                                        'placeholder' => 'หมู่',
                                                        'class' => 'form-control',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fa-solid fa-people-roof"></i> ซอย :</strong>
                                                    {!! Form::text('soi', null, [
                                                        'id' => 'Addsoi',
                                                        'placeholder' => 'ซอย',
                                                        'class' => 'form-control',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-road"></i> ถนน :</strong>
                                                    {!! Form::text('road', null, [
                                                        'id' => 'Addroad',
                                                        'placeholder' => 'ถนน',
                                                        'class' => 'form-control',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fa-solid fa-city"></i> จังหวัด :</strong>
                                                    <select class="select2 form-control" id="Addcity"
                                                        name="city">
                                                        <option value="0">กรุณาเลือก</option>
                                                        <option value="1">กรุงเทพมหานคร</option>
                                                        <option value="2">นนทบุรี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fa-solid fa-building-circle-arrow-right"></i>
                                                        อำเภอ:</strong>
                                                    <select class="select2 form-control" id="Adddistrict"
                                                        name="district">
                                                        <option value="">กรุณาเลือกอำเภอ</option>
                                                        <option value="1">บางบัวทอง </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fa-solid fa-building-circle-arrow-right"></i>
                                                        ตำบล
                                                        :</strong>
                                                    <select class="select2 form-control" id="Addsubdistrict"
                                                        name="subdistrict">
                                                        <option value="">กรุณาเลือกตำบล</option>
                                                        <option value="1">ลำโพ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-code"></i> รหัสไปรษณีย์:</strong>
                                                    {!! Form::text('postcode', null, [
                                                        'id' => 'Addpostcode',
                                                        'placeholder' => 'รหัสไปรษณีย์',
                                                        'class' => 'form-control',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-phone"></i> เบอร์โทรศัพท์บ้าน:</strong>
                                                    {!! Form::text('telhome', null, [
                                                        'id' => 'Addtelhome',
                                                        'placeholder' => 'เบอร์โทรศัพท์บ้าน',
                                                        'class' => 'form-control',
                                                        'onkeydown' => 'validateNumber(event)',
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-phone"></i> เบอร์โทรศัพท์มือถือ :</strong>
                                                    {!! Form::text('phoneno', null, [
                                                        'id' => 'Addphoneno',
                                                        'placeholder' => 'เบอร์โทรศัพท์มือถือ',
                                                        'class' => 'form-control',
                                                        'onkeydown' => 'validateNumber(event)',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <strong><i class="fas fa-phone"></i>
                                                        เบอร์โทรศัพท์ที่ทำงาน:</strong>
                                                    {!! Form::text('workno', null, [
                                                        'id' => 'Addworkno',
                                                        'placeholder' => 'เบอร์โทรศัพท์ที่ทำงาน',
                                                        'class' => 'form-control',
                                                        'onkeydown' => 'validateNumber(event)',
                                                    ]) !!}
                                                </div>
                                            </div>
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
                    บันทึกข้อมูล</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal"><i
                        class="fas fa-door-closed"></i> ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>
