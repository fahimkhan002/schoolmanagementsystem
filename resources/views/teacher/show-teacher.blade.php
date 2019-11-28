@extends('layouts.app')

@section('content')
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @if (session('message'))
                    <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                    @if (session('deleteMessage'))
                        <div class="col-sm-12">
                            <div class="alert  alert-info alert-dismissible fade show" role="alert">
                                {{ session('deleteMessage') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Teacher</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Teachers</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary card-outline">

                <div class="card-header">
                    <span style="font-size:19px;">All Teachers</span>
                    <a href="{{route('createTeacher')}}" class="btn btn-primary" style="float: right"><i class="fas fa-plus-circle">Add Teacher </i> </a>
                </div>


                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 170px;">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 140px;">Photo</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 219px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">Teacher ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 143px;">Phone No</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 150px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($teachers as $teacher)
                                    <tr role="row" class="odd">

                                        <td class="sorting_1">{{$teacher->teacher_id}}</td>

                                        @if($teacher->photo != null)
                                        <td>
                                            <img class="img-responsive mx-auto d-block" style="height: 50px; width: 50px;" src="{{asset('storage/'.$teacher->photo)}}" alt="">
                                        </td>
                                        @else
                                            <td>
                                                <img class="img-responsive mx-auto d-block rounded" style="height: 50px; width: 50px;" src="{{asset('storage/uploads/profile.png')}}" alt="">
                                            </td>
                                        @endif
                                        <td>{{$teacher->user->name}}</td>
                                        <td>{{$teacher->id_card}}</td>
                                        <td>{{$teacher->phone_no}}</td>
                                        <td>{{$teacher->user->email}}</td>
                                        <td>
                                            @if($teacher->gender)
                                               Male
                                            @else
                                                Female
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a title="Details" href="/manage/teacher/{{$teacher->teacher_id}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                                </a>
                                            </div>

                                            <div class="btn-group">
                                                <a title="Edit" href="/manage/teacher/{{$teacher->teacher_id}}/edit" class= "btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <div class="btn-group">
                                                <form method="POST" action="{{route('deleteTeacher',$teacher->teacher_id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">#</th><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Teacher ID</th><th rowspan="1" colspan="1">Phone No</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Gender</th><th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );

        $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-success").slideUp(500);
        });

        $(".alert-info").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert-info").slideUp(500);
        });
    </script>
@endsection
