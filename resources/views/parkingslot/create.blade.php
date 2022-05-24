@extends('layouts.master')

@section('title','Add Parking Slot')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Parking Slot</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Parking Slot</li>
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
                    <h3 class="card-title">Add
                        <a href="{{route('parkingslot.index')}}" class="btn btn-success">List</a>
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
                    <form action="{{route('parkingslot.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="number">Parking Slot No.</label>
                            @if (isset($data['last_id']->number))
                            <input type="text" class="form-control" name="number" id="number" value="{{$data['last_id']->number+1}}" readonly>
                            @else
                            <input type="text" class="form-control" name="number" id="number" value="1" readonly>
                            @endif
                            <label for="status">Status</label>
                            <input type="radio" name="status" id="deactive" value="0" checked>Available
                            <input type="radio" name="status" id="active" value="1">Unavailable
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSave" value="Save" class="btn btn-primary">
                        </div>
                    </form>
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
