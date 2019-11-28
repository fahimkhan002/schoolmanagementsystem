@extends('layouts.app')

@section('content')
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">

                            @if($teacher->photo != null)
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="height: 200px; width: 200px;" src="{{asset('storage/'.$teacher->photo)}}" alt="User profile picture">
                            </div>
                            @else
                                <div class="text-center">
                                    <img class="img-responsive mx-auto d-block rounded" style="height: 200px; width: 200px;" src="{{asset('storage/uploads/profile.png')}}" alt="">
                                </div>
                            @endif

                            <h3 class="profile-username text-center">{{$teacher->user->name}}</h3>

                            <p class="text-muted text-center">{{$teacher->designation}}</p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                               {{$teacher->qualification}}
                            </p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                               Profile
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                {{$teacher->user->name}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                {{$teacher->user->email}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Date of Birth</label>
                                            <div class="col-sm-10">
                                                {{$teacher->dob}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Designation</label>
                                            <div class="col-sm-10">
                                                {{$teacher->designation}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Qualification</label>
                                            <div class="col-sm-10">
                                                {{$teacher->qualification}}
                                            </div>
                                        </div>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


            </div>

        </div>

    </div>
    @include('layouts.partials.footer')


@endsection
