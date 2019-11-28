@extends('layouts.app')

@section('content')
    @include('layouts.partials.nav')
    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <span id="result"></span>
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


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <div class="content">
            <div class="container-fluid">

                <div class="card card-primary card-outline">

                    <div class="card-header">
                        <span style="font-size:19px;">Time Table</span>
                        <a href="{{route('createTimeTable')}}" class="btn btn-primary" style="float: right"><i class="fas fa-plus-circle">Add TimeTable </i> </a>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="name">Class<span class="text-danger">*</span></label>

                                    <select class="form-control select2 select2-hidden-accessible"  data-dependent="sections" required="true" name="class_id" id="class_id" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Pick Class</option>
                                        @foreach($iClass as $iClasses)
                                            <option value="{{$iClasses->id}}">{{$iClasses->name}}</option>
                                        @endforeach
                                    </select>

                                    <div>{{$errors->first('class_id')}}</div>
                                </div>

                                <div class="col-md-5">
                                    <label for="name">Section<span class="text-danger">*</span></label>

                                    <select class="form-control select2 select2-hidden-accessible section" required="true" name="sections" id="sections" tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Pick Section</option>

                                    </select>

                                    <div>{{$errors->first('section')}}</div>
                                </div>

                                <div class = "col-md-2 mt-2">
                                    <button class="btn-primary mt-4" id="btnFind" name = "btnFind">Find TimeTable</button>
                                </div>

                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div class="col-lg-12">

                                    <table id="table1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <tr>
                                            <th align="center"></th>
                                            <th>8:00AM-8:40AM</th>
                                            <th>08:45AM-09:25AM</th>
                                            <th>09:30AM-10:10AM</th>
                                            <th>10:15AM-10:55AM</th>
                                            <th>11:00AM-11:40AM</th>
                                            <th>11:45AM-12:25PM</th>
                                            <th>12:30PM-1:10PM</th>
                                            <th>1:15PM-1:55PM</th>
                                        </tr>
                                        <tr id="monday">
                                            <td align="center">MONDAY</td>

                                        </tr>
                                        <tr id="tuesday">
                                            <td align="center">TUESDAY</td>

                                        </tr>
                                        <tr id="wednesday">
                                            <td align="center">WEDNESDAY</td>
                                        </tr>
                                        <tr id="thursday">
                                            <td align="center">THURSDAY

                                        </tr>
                                        <tr id="friday">
                                            <td align="center">FRIDAY

                                        </tr>
                                    </table>

                                </div>
                                </div>
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

///Section change with class
                    $(document).ready(function () {
                        $(document).on('change','#class_id',function () {

                            var classid = $(this).val();
                            var div=$(this).parent().parent().parent();

                            var op = "";

                            $.ajax({
                                type:'get',
                                url:'{{route("findSection")}}',
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
                    ///End Section change with class
                    $(document).ready(function () {
                       $('#btnFind').click(function () {



                           var class_id = $('#class_id').val();
                           var section = $('#sections').val();

                           var div=$(this).parent().parent().parent();
                           //alert(section);
                           var mondays = "";
                           var tuesday = "";
                           var wednesday = "";
                           var thursday = "";
                           var friday = "";
                           var noData = "";
                           div.find('#monday').html("<td align=center>MONDAY</td>");
                           div.find('#tuesday').html("<td align=center>TUESDAY</td>");
                           div.find('#wednesday').html("<td align=center>WEDNESDAY</td>");
                           div.find('#thursday').html("<td align=center>THURSDAY</td>");
                           div.find('#friday').html("<td align=center>FRIDAY</td>");

                           $.ajax({
                           type:'get',
                           url:'{!! URL::to('findTimetable') !!}',
                           data:{'class_id':class_id,'section_id':section},
                           success:function (data) {

                                   for (var i = 0; i < data.length; i++)
                                   {

                                       if(data[i].days ==1) {
                                           mondays += '<td>' + data[i].subject.name + '(' + data[i].teacher.user.name + ')' + '</td>';
                                       }
                                       else if(data[i].days === "2")
                                       {
                                           tuesday += '<td>' + data[i].subject.name + '(' + data[i].teacher.user.name + ')' + '</td>';

                                       }

                                       else if(data[i].days === "3")
                                       {
                                           wednesday += '<td>' + data[i].subject.name + '(' + data[i].teacher.user.name + ')' + '</td>';

                                       }

                                       else if(data[i].days === "4")
                                       {
                                           thursday += '<td>' + data[i].subject.name + '(' + data[i].teacher.user.name + ')' + '</td>';

                                       }

                                       else if(data[i].days === "5")
                                       {
                                           friday += '<td>' + data[i].subject.name + '(' + data[i].teacher.user.name + ')' + '</td>';

                                       }
                                       else{
                                                noData+= '<tr><td>'+"NO DATA FOUND"+'</td></tr>';
                                       }

                                   }

                                   div.find('#monday').append(mondays);
                                   div.find('#tuesday').append(tuesday);
                                   div.find('#wednesday').append(wednesday);
                                   div.find('#thursday').append(thursday);
                                   div.find('#friday').append(friday);
                                   div.find('table').append(noData);
                           },

                           error:function () {
                            console.log("Error");
                           }
                       })


                       });
                    });





                </script>




@endsection
