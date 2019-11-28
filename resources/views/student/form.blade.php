<div class="row">
    <div class="col-md-4">

        <label for="name">Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if($student){{$student->user->name}}@else{{old('name')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('name')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Email<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="@if($student){{$student->user->email}}@else{{old('email')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
        </div>
        <div>{{$errors->first('email')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Gender<span class="text-danger">*</span></label>
        <div class="input-group">
            <select class="form-control select2 select2-hidden-accessible" required="true" name="gender" id="gender" tabindex="-1" aria-hidden="true">
                <option disabled selected>Pick you Gender</option>
                <option value="1" @if($student){{$student->gender == 'Male' ? 'selected':''}}@endif >Male</option>
                <option value="2" @if($student){{$student->gender == 'Female' ? 'selected':''}}@endif>Female</option>
            </select>
        </div>
        <div>{{$errors->first('gender')}}</div>
    </div>

</div>

<div class="row pt-3">

    <div class="col-md-4">
        <label for="name">Date of Birth<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="@if($student){{$student->dob}}@else{{old('dob')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>

        </div>
        <div>{{$errors->first('dob')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Address<span class="text-danger">*</span></label>
        <div class="input-group">
                    <textarea class="form-control"  maxlength="500" name="address" id="address" placeholder="Address">
                       @if($student){{ $student->address }}@else{{old('address')}}@endif
                    </textarea>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>

        </div>
        <div>{{$errors->first('address')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Father Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Father Name" value="@if($student){{$student->fathername}}@else{{old('fathername')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>

        </div>
        <div>{{$errors->first('address')}}</div>
    </div>
</div>


<div class="row pt-3">
    <div class="col-md-4">
        <label for="name">Father Phone No.<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="fatherphoneno" id="fatherphoneno" placeholder="Father Phone No." value="@if($student){{$student->fatherphoneno}}@else{{old('fatherphoneno')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>

        </div>
        <div>{{$errors->first('fatherphoneno')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">ID Card</label>
        <div class="input-group">
            <input type="number" class="form-control" name="idcard" id="idcard" placeholder="Eg:: ID = 0000000001" value="@if($student){{$student->idcard}}@else{{old('idcard')}}@endif">
        </div>
        <div>{{$errors->first('idcard')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Note</label>
        <div class="input-group">
            <textarea type="text" class="form-control" name="note" id="note" placeholder="Note">
              @if($student){{ $student->note }}@else{{old('note')}}@endif
            </textarea>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
        </div>
    </div>

</div>

<div class="row pt-3">
    <div class="col-md-4">
        <label for="name">Enrollment Date<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="enrollmentDate" id="enrollmentDate" placeholder="Enrollment Date" value="@if($student){{$student->enrollmentDate}}@else{{old('enrollmentDate')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>

        </div>
        <div>{{$errors->first('enrollmentDate')}}</div>
    </div>

    <div class="col-md-4">
        <div class="form-group has-feedback">
            <label for="photo">Photo<br><span class="text-danger">[min 150 X 150 size and max 200kb]</span></label>
            <input type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" id="photo" placeholder="Photo image">
            <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:45px;"></span>
            <span class="text-danger"></span>
        </div>
        <div>{{$errors->first('photo')}}</div>
    </div>

</div>
<br/>
<h3>Academic Details</h3>


<div class="row pt-3">

    <div class="col-md-5">
        <label for="name">Class<span class="text-danger">*</span></label>

        <select class="form-control select2 select2-hidden-accessible"  data-dependent="section" required="true" name="class_id" id="class_id" tabindex="-1" aria-hidden="true">
            <option disabled selected>Pick Class</option>
            @foreach($iClass as $iClasses)
                <option value="{{$iClasses->id}}" @if($student){{$iClasses->id == $student->class_id ? 'selected':''}}@endif>{{$iClasses->name}}</option>
            @endforeach
        </select>

        <div>{{$errors->first('class_id')}}</div>
    </div>

    <div class="col-md-5">
        <label for="name">Section<span class="text-danger">*</span></label>

        <select class="form-control select2 select2-hidden-accessible section" required="true" name="section" id="section" tabindex="-1" aria-hidden="true">
            <option disabled selected>Pick Section</option>
            @if($student)
            @foreach($sections as $section)
                <option value="{{$section->id}}" @if($student){{$section->id == $student->section_id ? 'selected':''}}@endif>{{$section->name}}</option>
            @endforeach
                @endif
        </select>

        <div>{{$errors->first('section')}}</div>
    </div>


</div>

@if(!$student)
<h2>Login Details</h2>
<div class="row pt-3">

    <div class="col-md-4">
        <label for="username">Username<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username')}}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa fa-user"></i></span>
            </div>
        </div>
        <div>{{$errors->first('username')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Password<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="password" value="{{ old('password') }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>

        </div>
        <div>{{$errors->first('password')}}</div>
    </div>

</div>
@endif
<br/>
