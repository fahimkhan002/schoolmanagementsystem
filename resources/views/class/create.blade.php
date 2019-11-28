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
                        <h1 class="m-0 text-dark">Manage Class</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item">Class</li>
                            <li class="breadcrumb-item active"><a href="#">Create</a></li>
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
                        <span style="font-size:19px;">Create New Class</span>
                    </div>

                    <form class="card-body" action="{{route('storeClass')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('class.form')
                        <br/>
                        <div class="card-footer">
                            <button type="submit" class=" btn btn-primary btn-md create-student">
                                Create Class
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
