@extends('layouts.app')

@section('content')
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">


                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage TimeTable</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Time Table</li>
                            <li class="breadcrumb-item active"><a href="">Create</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="card card-primary card-outline">

                    <div class="card-header">
                        <span style="font-size:19px;">Create New TimeTable</span>
                        <button type="button" name="add" id = "add" class="btn btn-success btn-md add" style="float: right"><i class="fas fa-plus-circle">Add More </i></button>
                    </div>

                    <form class="card-body"  method="POST" id="dynamic_form">
                        <span id="result"></span>
                        <div class="callout callout-danger">
                            <h4><b>Note:</b> Create class,Section and Teacher before create new TimeTable.</h4>
                        </div>
                        @csrf
                        @include('timetable.form')
                        <br/>
                        <div class="card-footer">
                            <button type="submit" class=" btn btn-primary btn-md create-student" name="save" id="save">
                                Create TimeTable
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript">


            $(document).ready(function(){

                var count = 1;

                dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                html += '<td><select name="class_id[]" id = "class_id" class="form-control item_unit"><option value="">Pick Class</option>@foreach($iClass as $iClasses)<option value = "{{$iClasses->id}}">{{$iClasses->name}}</option>@endforeach</select></td>';
                html += '<td><select name="section_id[]" id = "section_id" class="form-control item_unit"><option value="">Pick Section</option>@foreach($section as $sections)<option value = "{{$sections->id}}">{{$sections->name}}</option>@endforeach</select></td>';
                html += '<td><select name="subject_id[]" id = "subject_id" class="form-control item_unit"><option value="">Pick Subject</option>@foreach($subject as $subjects)<option value = "{{$subjects->id}}">{{$subjects->name}}</option>@endforeach</select></td>';
                html += '<td><select name="teacher_id[]" id = "teacher_id" class="form-control item_unit"><option value="">Pick Teacher</option>@foreach($teacher as $teachers)<option value = "{{$teachers->teacher_id}}">{{$teachers->user->name}} </option>@endforeach</select></td>';
                html += '<td><select name="days[]" id = "days" class="form-control item_unit"><option value="">Pick Day</option><option value="1">Monday</option><option value="2">Tuesday</option><option value="3">Wednesday</option><option value="4">Thursday</option><option value="5">Friday</option></select></td>';
                html += '<td><select name="Start_Time[]" id = "Start_Time" class="form-control item_unit">     <option selected disabled>Pick Time</option>\n' +
                    '                                    <option value="08:00">08:00</option>\n' +
                    '                                    <option value="08:45">08:45</option>\n' +
                    '                                    <option value="09:30">09:30</option>\n' +
                    '                                    <option value="10:15">10:15</option>\n' +
                    '                                    <option value="11:00">11:00</option>\n' +
                    '                                    <option value="11:45">11:45</option>\n' +
                    '                                    <option value="12:30">12:30</option>\n' +
                    '                                    <option value="01:15">01:15</option></select></td>';
                html += '<td> <button type="submit" class="btn btn-danger btn-sm remove" title="Delete"><i class="fa fa-fw fa-trash"></i></button></td></tr>';
                $('tbody').append(html);
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });


            $('#dynamic_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{ route("TimeTable.Store") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {

                            $('#result').html('<div class="alert alert-danger">'+data.error+'</div>');
                        }
                        else
                        {
                            dynamic_field(1);
                            window.location.href = "/manage/timetable";
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');

                        }
                        $('#save').attr('disabled', false);

                    }
                })
            });

            });





    </script>

@endsection
