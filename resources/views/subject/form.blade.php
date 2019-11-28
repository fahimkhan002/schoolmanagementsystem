<div class="row">
    <div class="col-md-4">

        <label for="name">Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if($subject){{$subject->name}}@else{{old('name')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('name')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Subject Code<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="code" id="code" placeholder="Code : 001,002,003 etc" value="@if($subject){{$subject->code}}@else{{old('code')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
            </div>
        </div>
        <div>{{$errors->first('code')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">ClassName<span class="text-danger">*</span></label>
        <div class="input-group">

            <select class="form-control select2 select2-hidden-accessible" required="true" name="class_id" id="class_id" tabindex="-1" aria-hidden="true">
                <option disabled selected="selected">Pick a Class</option>
                @foreach($iClass as $iClasses)
                    <option value="{{$iClasses->id}}" {{$iClasses->id == $subject->class_id ? 'selected' : '' }} >{{$iClasses->name}}{{old('class_id')}}</option>
                @endforeach
            </select>
        </div>
        <div>{{$errors->first('class_id')}}</div>
    </div>

</div>

