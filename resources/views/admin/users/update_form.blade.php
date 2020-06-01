<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users 
            <small>update</small>
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
                                <h3 class="box-title">
                                    @if($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        <li> {{$error}} </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    {!!Session::get('success')!!}
                                </h3>                                
                            </div>
                            <div class="col-md-6 text-right text-bold">
                                <a href="{{ URL::to('admin/'.$data['cname'])}}">
                                    <button class="btn btn-primary btn-flat" type="button">
                                        <i class="fa fa-eye" aria-hidden="true"></i> VIEW LIST
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- /.box-header -->
                        <!-- form start -->

                        {!! Form::model($show, [ 'method' => 'PATCH', 'class'=>'form-horizontal', 'route' => [$data['update'] , $show->id]]) !!}
                        <div class="box-body">                            
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-5">
                                    <input name="name" value="{{ $show->name }}" class="form-control" id="name" placeholder="Name" type="text" required>
                                </div>
                            </div>
                             
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-3">
                                    <input name="email" value="{{ $show->email }} " class="form-control" id="email" placeholder="Email" type="text" required>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="office" class="col-sm-2 control-label">Office</label>
                                <div class="col-sm-3">
                                    <select name="office" class="form-control">
                                        <option value="">Select..</option>
                                        @if(count($data['office'])>0)
                                            @foreach($data['office'] as $row )
                                            <option value="{{$row->id}}" @if($row->id == $show->office_id) {{'selected'}}  @endif >{{$row->name}} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-3">
                                    <input name="password" class="form-control" id="password" placeholder="Password" type="password" required>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-3">
                                    <input name="cpassword" class="form-control" id="cpassword" placeholder="Confirm password" type="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="office" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-3">
                                    <select name="status" class="form-control">
                                        <option value="1" @if($show->office_id == 1) {{'selected'}}  @endif >Active</option>
                                        <option value="0" @if($show->office_id == 2) {{'selected'}}  @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button class="btn btn-primary btn-flat" type="submit"> 
                                <i class="fa fa-save" aria-hidden="true"></i> 
                                SAVE 
                            </button>
                        </div>
                        <!-- /.box-footer -->
                        </form>

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
