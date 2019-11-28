<div class="row">
    <div class="col-md-4">

        <label for="name">Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if($section){{$section->name}}@else{{old('name')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('name')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Capacity<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Capacity : 10,20,30 etc" value="@if($section){{$section->capacity}}@else{{old('capacity')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
            </div>
        </div>
        <div>{{$errors->first('capacity')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">ClassName<span class="text-danger">*</span></label>
        <div class="input-group">

            <select class="form-control select2 select2-hidden-accessible" required="true" name="class_id" id="class_id" tabindex="-1" aria-hidden="true">
                <option disabled selected="selected">Pick a Class</option>
                @foreach($iClass as $iClasses)
                    <option value="{{$iClasses->id}}" {{$iClasses->id == $section->class_id ? 'selected' : '' }}>{{$iClasses->name}}{{old('class_id')}}</option>
                    @endforeach
            </select>
        </div>
        <div>{{$errors->first('class_id')}}</div>
    </div>



</div>

<div class="row pt-3">

    <div class="col-md-8">
        <label for="name">Note</label>
        <div class="input-group">
            <textarea type="text" class="form-control" name="note" id="note" placeholder="note" >@if($section){{$section->note}}@else{{old('note')}}@endif</textarea>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa fa-location-arrow"></i></span>
            </div>

        </div>
        <div>{{$errors->first('note')}}</div>
    </div>

</div>

