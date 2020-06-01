<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Discrepancy <small> Asses List </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Add New</a></li>
            <li class="active">Discrepancy</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">{!!Session::get('success')!!}</h3>
                            </div>
                            <div class="col-md-6 text-right text-bold">
                                <a href="{{ URL::to('admin/'.$data['cname'])}}">
                                    <button class="btn btn-primary btn-flat" type="button">
                                        <i class="fa fa-eye" aria-hidden="true"></i> VIEW LIST
                                    </button>
                                </a> &nbsp;
                                <a class="text-bold" href="{{URL::to('admin/'.$data['cname'] .'/'. $show->id . '/edit')}}">
                                    <button class="btn btn-warning btn-flat" type="button">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> EDIT DATA
                                    </button>
                                </a>                              
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-5">
                                            {{ $show->name }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="tin" class="col-sm-2 control-label">Tin</label>
                                        <div class="col-sm-5">
                                            {{ $show->tin }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="comments" class="col-sm-2 control-label"> Office </label>
                                        <div class="col-sm-10">
                                            {!!$show->office_id!!}
                                        </div>
                                    </div>                                        
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label for="comments" class="col-sm-4 control-label"> Create Date </label>
                                        <div class="col-sm-6">
                                            {{$show->created_at}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="comments" class="col-sm-4 control-label"> Create By </label>
                                        <div class="col-sm-6">
                                            {{$show->created_by}}
                                        </div>
                                    </div>  
                                    <div class="col-md-12">
                                        <label for="comments" class="col-sm-4 control-label"> Asses Year </label>
                                        <div class="col-sm-6">
                                            {{$show->asses_year}}
                                        </div>
                                    </div>                 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <br>
                                    <label class="control-label">Short Details</label> 
                                    <p>{!! str_limit($show->comments, 250) !!} </p>
                                    <!-- Button trigger modal -->

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#descReadmore">Read More</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="descReadmore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $show->comments !!} 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>         
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="box-header text-center">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="box-title text-bold  "> Hearing Dates</h3>
                                        </div>
                                        <div class="col-md-4 text-left">
                                            <p class="text-right">    
                                                <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#AddNewHearingDateForm">
                                                    <i class="fa fa-plus " aria-hidden="true"></i> ADD NEW HEARING DATE
                                                </button>
                                            </p>
                                            <!-- Modal -->
                                            <div class="modal fade" id="AddNewHearingDateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        {{ Form::open(array('url' => 'admin/hearing', 'class'=>'form-horizontal')) }}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Hearing Date</h4>
                                                        </div>
                                                         
                                                        <div class="modal-body">
                                                            <div class="box-body">
                                                                <input name="discrepancyId" value="{{Request::segment(3)}}" type="hidden">
                                                                <div class="form-group">
                                                                    <label for="hearingDate" class="col-sm-4 control-label">Hearing Date</label>
                                                                    <div class="col-sm-6">
                                                                        <input name="hearingDate" value="{{ old('hearing_date') }} " class="form-control hearingDate" data-date-format="yyyy-mm-dd" placeholder="hearingDate" type="text" required>
                                                                    </div>
                                                                </div>    
                                                            </div>
                                                            <!-- /.box-body -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary btn-flat" type="submit">
                                                                <i class="fa fa-save" aria-hidden="true"></i>
                                                                SAVE
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>        

                                        </div>                                    
                                    </div>                                    
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Date</th>
                                                <th style="width: 100px">Status</th>
                                                <th style="width: 100px">Process</th>
                                            </tr>
                                            @if (count($hearing) > 0)
                                            @foreach($hearing as $row)
                                            <tr>
                                                <td style="width: 10px">{{$i++}}</td>
                                                <td>{{$row->hearing_date}}</td>
                                                <td style="width: 100px">

                                                    @if(strtotime($row->hearing_date)- strtotime(date('Y-m-d'))>0)

                                                    <button type="button" class="btn btn-block btn-success btn-xs">Active</button>
                                                    @else
                                                    <button type="button" class="btn btn-block btn-danger btn-xs">Past</button>
                                                    @endif                                                  
                                                </td>
                                                <td style="width: 100px">

                                                    {{-- Edit Start --}}
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editHearing{{$row->id}}">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </button> 

                                                    <div class="modal fade" id="editHearing{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                {{ Form::open(array('url' => 'admin/hearing', 'class'=>'form-horizontal')) }}
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Hearing Date</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    
                                                                    <div class="box-body">
                                                                        <input name="discrepancyId" value="{{Request::segment(3)}}" type="hidden">
                                                                        <input name="id" value="{{$row->id}}" type="hidden">
                                                                        <div class="form-group">
                                                                            <label for="hearingDate" class="col-sm-4 control-label">Hearing Date</label>
                                                                            <div class="col-sm-6">
                                                                                <input name="hearingDate" value="{{$row->hearing_date}}" class="form-control hearingDate" data-date-format="yyyy-mm-dd" placeholder="hearingDate" type="text" required>
                                                                            </div>
                                                                        </div>    
                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-primary btn-flat" type="submit">
                                                                        <i class="fa fa-save" aria-hidden="true"></i>
                                                                        SAVE
                                                                    </button>
                                                                    
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>                                                                                                 
                                                    {{-- Edit End --}}

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button> 
                                                    <div class="modal fade modal-danger" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        Are you sure you want to delete this Post?                 
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button> &nbsp;
                                                                    {{ Form::open(['method' => 'DELETE','route' => ['admin.hearing.destroy', $row->id], 'style'=>'display:inline;']) }}
                                                                    <button type="submit" class="btn btn-outline btn-danger pull-right delete-confirm">Yes, Delete This Post</button>   
                                                                    {!! Form::close() !!} 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </td>
                                            </tr>
                                            @endforeach 
                                            @else
                                            I don't have any records!
                                            @endif       

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                                <div style="border-color: 1px solid #fff;" class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        <li><a href="#">«</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>         

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
