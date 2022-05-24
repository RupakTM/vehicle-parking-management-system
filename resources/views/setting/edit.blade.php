@extends('layouts.master')

@section('title','Company Profile Management')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Company Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Company Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Company Profile</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <p class="alert alert-success" id="successMessage">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                        <p class="alert alert-danger" id="errorMessage">{{ Session::get('error') }}</p>
                    @endif
                    <form action="{{route('setting.update',$data['setting']->id)}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$data['setting']->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$data['setting']->name}}">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$data['setting']->address}}">
                            @error('address')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pan_no">Pan Number</label>
                            <input type="text" class="form-control" name="pan_no" id="pan_no" value="{{$data['setting']->pan_no}}">
                            @error('pan_no')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="reg_no">Registration Number</label>
                            <input type="text" class="form-control" name="reg_no" id="reg_no" value="{{$data['setting']->reg_no}}">
                            @error('reg_no')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{$data['setting']->phone}}">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="logo_file">Logo</label> <br>
                            <img src="{{asset('uploads/images/settings/'.$data['setting']->logo)}}" height="100px" width="100px">
                            <input type="file" class="form-control" name="logo_file" id="logo_file">
                            @error('logo_file')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fav_file">Fav Icon</label> <br>
                            <img src="{{asset('uploads/images/settings/'.$data['setting']->fav_icon)}}" height="50px" width="50px">
                            <input type="file" class="form-control" name="fav_file" id="fav_file">
                            @error('fav_file')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price_per_hour">Rate</label>
                            <input type="text" class="form-control" name="price_per_hour" id="price_per_hour" value="{{$data['setting']->price_per_hour}}">
                            @error('price_per_hour')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSave" value="Save" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@section('js')
<script type="text/javascript">
    window. setTimeout(()=>{
            $('#successMessage').fadeOut();
        },2000);
        window. setTimeout(()=>{
            $('#errorMessage').fadeOut();
        },2000);
</script>   
@endsection