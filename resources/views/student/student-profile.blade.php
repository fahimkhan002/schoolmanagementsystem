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

                                        @if($student->photo != null)
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" style="height: 200px; width: 200px;" src="{{asset('storage/'.$student->photo)}}" alt="Student profile picture">
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <img class="img-responsive mx-auto d-block rounded" style="height: 200px; width: 200px;" src="{{asset('storage/uploads/profile.png')}}" alt="">
                                            </div>
                                        @endif

                                        <h3 class="profile-username text-center">{{$student->user->name}}</h3>

                                        <p class="text-muted text-center">{{$student->user->role->name}}</p>

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
                                        <strong><i class="fas fa-book mr-1"></i> Class</strong>

                                        <p class="text-muted">
                                            {{$student->iClass->name}}
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
                                                    {{$student->user->name}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    {{$student->user->email}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    {{$student->dob}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">Class</label>
                                                <div class="col-sm-10">
                                                    {{$student->iClass->name}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Section</label>
                                                <div class="col-sm-10">
                                                    {{$student->section->name}}
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
