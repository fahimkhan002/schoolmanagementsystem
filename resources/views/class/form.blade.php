<div class="row">
    <div class="col-md-4">

        <label for="name">Name<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="@if($iclass){{$iclass->name}}@else{{old('name')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-info"></i></span>
            </div>
        </div>
        <div>{{$errors->first('name')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Numeric Value<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="numericvalue" id="numericvalue" placeholder="Numeric Value : 1,2,3,4 etc" value="@if($iclass){{$iclass->numericvalue}}@else{{old('numericvalue')}}@endif">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
            </div>
        </div>
        <div>{{$errors->first('numericvalue')}}</div>
    </div>

    <div class="col-md-4">

        <label for="name">Group<span class="text-danger">*</span></label>
        <div class="input-group">

            <select class="form-control select2 select2-hidden-accessible" required="true" name="group" id="group" tabindex="-1" aria-hidden="true" value="@if($iclass){{$iclass->group}}@else{{old('group')}}@endif">
                <option disabled selected="selected">Pick a Group</option>
                <option value="1"{{ $iclass->group == 1 ? 'selected' : '' }}>None</option>
                <option value="2"{{ $iclass->group == 2 ? 'selected' : '' }}>Science</option>
                <option value="3"{{ $iclass->group == 3 ? 'selected' : '' }}>Humanities</option>
                <option value="4"{{ $iclass->group == 4 ? 'selected' : '' }}>Commerce</option>
            </select>
        </div>
        <div>{{$errors->first('group')}}</div>
    </div>



</div>

<div class="row pt-3">

    <div class="col-md-8">
        <label for="name">Note</label>
        <div class="input-group">
            <textarea type="text" class="form-control" name="note" id="note" placeholder="note" >@if($iclass){{$iclass->note}}@else{{old('note')}}@endif</textarea>
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa fa-location-arrow"></i></span>
            </div>

        </div>
        <div>{{$errors->first('note')}}</div>
    </div>

</div>

