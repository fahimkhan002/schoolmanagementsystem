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
                        <h1 class="m-0 text-dark">Manage Student</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Students</li>
                            <li class="breadcrumb-item active"><a href="">Update</a></li>
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
                        <span style="font-size:19px;">Update Student Info</span>
                    </div>

                    <form class="card-body" action="{{route('studentUpdate',$student->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('student.form')

                        <div class="card-footer">
                            <button type="submit" class=" btn btn-success btn-md update-student">
                                Update Student
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

        $( "#dob" ).datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true
        });

        $( "#enrollmentDate" ).datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true,
            changeMonth: true,
            changeYear: true
        });


        $(document).ready(function () {
            $(document).on('change','#class_id',function () {

                var classid = $(this).val();
                var div=$(this).parent().parent().parent();

                var op = "";

                $.ajax({
                    type:'get',
                    url:'{!! URL::to('findSectionName') !!}',
                    data:{'id':classid},
                    success:function (data) {
                        console.log('success');
                        //console.log(data.length);
                        op+='<option value="0" selected disabled>Choose Section</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';

                        }
                        div.find('.section').html(" ");
                        div.find('.section').append(op);

                    },
                    error:function () {

                    }
                });

            });
        });

    </script>

@endsection
