@extends('layouts.master')

@section('title','Parking Slot List')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Parking Slot</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List Parking Slot</li>
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
                    <h3 class="card-title">List
                        <a href="{{route('parkingslot.create')}}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create
                        </a>
                    </h3>

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
                    <table class="table table-bordered">
                        <tr>
                            <th>Parking Slot No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data['rows'] as $i => $row)
                            <tr>
                                <td>{{$row->number}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <span class="text-danger">Unavailable</span>
                                    @else
                                        <span class="text-success">Available</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('parkingslot.show',$row->id)}}" class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    </a>
                                    <a href="{{route('parkingslot.edit',$row->id)}}" class="btn btn-warning">
                                        <i class="fas fa-edit" aria-hidden="true"></i> Edit</a>
                                    </a>
                                    <form action="{{route('parkingslot.destroy',$row->id)}}" method="post" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i> Delete</button>
                                    </form>

                                    {{--                                    <form action="{{route('category.destroy',$row->id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="_method" value="delete">--}}
{{--                                        <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                    </form>--}}

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
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
