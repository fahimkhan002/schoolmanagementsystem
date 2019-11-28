<div class="row">
    <div class="col-md-4">

        <label for="name">Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if($teacher){{ $teacher->user->name}}@else{{old('name')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('name')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Designation<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="@if($teacher){{ $teacher->designation}}@else{{old('designation')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('designation')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Qualification<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="qualification" id="qualification" placeholder="Qualification" value="@if($teacher){{ $teacher->qualification}}@else{{old('qualification')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('qualification')}}</div>
    </div>



</div>

<div class="row pt-3">

    <div class="col-md-4">
        <label for="name">Date of Birth<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="@if($teacher){{ $teacher->dob}}@else{{old('dob')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>

        </div>
        <div>{{$errors->first('dob')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Gender<span class="text-danger">*</span></label>
        <div class="input-group">
            <select class="form-control select2 select2-hidden-accessible" required="true" name="gender" id="gender" tabindex="-1" aria-hidden="true" value="@if($teacher){{ $teacher->gender}}@else{{old('gender')}}@endif">
                <option value="1" selected="selected">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
        <div>{{$errors->first('gender')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Email<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="@if($teacher){{ $teacher->user->email}}@else{{old('email')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>

        </div>
        <div>{{$errors->first('email')}}</div>
    </div>
</div>


<div class="row pt-3">
    <div class="col-md-4">
        <label for="name">Phone No.</label>
        <div class="input-group">
            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone No." value="@if($teacher){{ $teacher->phone_no}}@else{{old('phone')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
            </div>
        </div>
        <div>{{$errors->first('phone')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">ID Card / EmployeeID<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="id_card" id="id_card" placeholder="Employee ID card No." value="@if($teacher){{ $teacher->id_card}}@else{{old('id_card')}}@endif">
        </div>
        <div>{{$errors->first('id_card')}}</div>
    </div>

    <div class="col-md-4">
        <label for="name">Address</label>
        <div class="input-group">
            <textarea class="form-control" name="address" id="address" maxlength="500" aria-invalid="false">@if($teacher){{ $teacher->address}}@else{{old('address')}}@endif </textarea>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
            </div>
        </div>
        <div>{{$errors->first('address')}}</div>
    </div>

</div>

<div class="row pt-3">
    <div class="col-md-4">
        <label for="name">Joining Date<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="joining_date" id="joining_date" placeholder="joining Date" value="@if($teacher){{ $teacher->joining_date}}@else{{old('joining_date')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
        </div>
        <div>{{$errors->first('joining_date')}}</div>
    </div>

    <div class="col-md-3">
        <div class="form-group has-feedback">
            <label for="photo">Photo<br><span class="text-danger">[min 150 X 150 size and max 200kb]</span></label>
            <input type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" id="photo" placeholder="Photo image">
            <span class="glyphicon glyphicon-open-file form-control-feedback" style="top:45px;"></span>
            <span class="text-danger"></span>
        </div>
        <div>{{$errors->first('photo')}}</div>
    </div>


</div>
<hr/>

<div class="row pt-3">
    @if(!$teacher)
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
    @endif

</div>

