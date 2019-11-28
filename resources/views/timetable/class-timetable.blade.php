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


<table id="table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
    <tr>
        <td align="center"></td>
        <td>8:00AM-8:40AM</td>
        <td>08:45AM-09:25AM</td>
        <td>09:30AM-10:10AM</td>
        <td>10:15AM-10:55AM</td>
        <td>11:00AM-11:40AM</td>
        <td>11:45AM-12:25PM</td>
        <td>12:30PM-1:10PM</td>
        <td>1:15PM-1:55PM</td>
    </tr>
    <tr>
        <td align="center">MONDAY</td>
        @foreach($monday as $mondays)
            <td align="center"><span style="color: blue; ">{{$mondays->subject->name}}({{$mondays->teacher->user->name}})</span></td>
                <br>
        @endforeach
    </tr>
    <tr>
        <td align="center">TUESDAY</td>
        @foreach($tuesday as $tuesdays)
        <td align="center"><span style="color: blue; ">{{$tuesdays->subject->name}}({{$tuesdays->teacher->user->name}})<br></span></td>
        @endforeach
    </tr>
    <tr>
        <td align="center">WEDNESDAY</td>
        @foreach($wednesday as $wednesdays)
        <td align="center"><span style="color: pink; ">{{$wednesdays->subject->name}}({{$wednesdays->teacher->user->name}})<br></span></td>
        @endforeach
    </tr>
    <tr>
        <td align="center">THURSDAY
        @foreach($thursday as $thursdays)
        <td align="center">{{$thursdays->subject->name}}({{$thursdays->teacher->user->name}})<br></td>
            @endforeach
    </tr>
    <tr>
        <td align="center">FRIDAY
        @foreach($friday as $fridays)
        <td align="center"><span style="color: orange; ">{{$fridays->subject->name}}({{$fridays->teacher->user->name}})<BR></span></td>
        @endforeach
    </tr>
</table>
                </div>
            </div>
        </div>
    </div>
