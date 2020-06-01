<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Generate Report 
            <small>Form</small>
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
<!--                                <a href="{{ URL::to('admin/'.$data['cname'])}}">
                                    <button class="btn btn-primary btn-flat" type="button">
                                        <i class="fa fa-eye" aria-hidden="true"></i> VIEW LIST
                                    </button>
                                </a>-->
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- /.box-header -->
                        <!-- form start -->
                        {{ Form::open(array('url' => 'admin/'.$data['cname'], 'class'=>'form-horizontal')) }}

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-5">
                                    <input name="name" value="{{ old('name') }} " class="form-control" id="name" placeholder="Name" type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tin" class="col-sm-2 control-label">Tin</label>
                                <div class="col-sm-5">
                                    <input name="tin" value="{{ old('tin') }}" class="form-control" id="Tin" placeholder="Tin" data-inputmask="'mask': ['9999-9999-9999']" data-mask type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tin" class="col-sm-2 control-label">Office</label>
                                <div class="col-sm-3">
                                    <select name="office" class="form-control" required>
                                        <option value="">Select an Office.....</option>
                                        <option value="{{ old('office') }}"> Office  </option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="tin" class="col-sm-2 control-label">Asses Year</label>
                                <div class="col-sm-3">
                                    <select name="asses_year" class="form-control" >
                                        <option value="">Select an Asses Year</option>
                                        <option value="{{ old('asses_year') }}"> 2014-2015  </option>
                                    </select>
                                </div>
                            </div>                            
                                                     
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button class="btn btn-primary btn-flat" type="submit">
                                <i class="fa fa-save" aria-hidden="true"></i>
                                GENERATE
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
