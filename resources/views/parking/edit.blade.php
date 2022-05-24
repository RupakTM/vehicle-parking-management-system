@extends('layouts.master')

@section('title','Edit Car')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parking Information</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Parking Information</li>
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
                    <h3 class="card-title">Edit Parking Information</h3>

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
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <form action="{{route('parking.update',$data['row']->id)}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" value="{{$data['row']->id}}">
                        @csrf
                        <div class="form-group">
                            <label for="car_no">Car Number</label>
                            <input type="text" class="form-control" name="car_no" id="car_no" value="{{$data['row']->car_no}}">
                            @error('car_no')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{$data['row']->customer_name}}">
                            @error('customer_name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="parking_slot_no" id="parking_slot_no" value="{{$data['row']->parking_slot_no}}">
                            <input type="submit" name="btnUpdate" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script>

        // $(document).ready(function (){
        //     $('select').on('change', function() {
        //         var value = this.value;
        //         document.getElementsByName("car_id").id = value;
        //         // alert(document.getElementsByName("car_id").id);
        //     });
        //
        //
        // });

        $(document).ready(function (){
            $('select').on('change', function() {
                var value = this.value;
                document.getElementById("car_id").value = value;
                // alert(document.getElementsByName("car_id").id);
            });


        });
        // $(function(){
        //     $(".form-control").on('change',function(e){
        //         $("#yourFormId").attr("action","/search/the/" + $(this).val());
        //     });
        // });
        //onsubmit
        {{--function validateForm(form){--}}
        {{--    // alert('Hello');--}}
        {{--    var exit_id = document.getElementById("car_id").value;--}}
        {{--    // alert(exit_id);--}}
        {{--    var url = '{{ route("parking.update", ":id") }}';--}}
        {{--    url = url.replace(':id',exit_id);--}}
        {{--    // alert(url);--}}
        {{--   form.action = url;--}}
        {{--   // alert(form.action);--}}
        {{--   // return false;--}}
        {{--}--}}

        //button onclick event
        {{--function exitCar() {--}}
        {{--   // alert('Hello');--}}
        {{--    var exit_id = document.getElementById("car_id").value;--}}
        {{--    // alert(exit_id);--}}
        {{--    var url = '{{ route("parking.update", ":id") }}';--}}
        {{--    url = url.replace(':id',exit_id);--}}
        {{--    // alert(url);--}}
        {{--    // var url = "http://www.(url).com";--}}
        {{--    window.location.href=url;--}}
        {{--}--}}

        //url pass to form action
        // $('#search').on('submit', function() {
        //     var id = $('#demo').val();
        //     var formAction = $('#search').attr('action');
        //     $('#search').attr('action', formAction + id);
        // });

        // document.getElementById("exit").action = route('parking.update',id);
        //document.getElementById('sky-form').action = 'second_02.html?pid=' + vpid;
        // function validateForm() {
        //     // alert('Validating form...');
        //     var car_info = document.getElementById('car_no').value;
        //     car_info = escape(car_info);
        //     location.href = route('parking.update',car_info);
        //     return false;
        // }

        {{--function validateForm(){--}}
        {{--    var e = document.getElementById("car_id");--}}
        {{--    var strUser = e.value;--}}
        {{--    var action_src = "{!! route('parking.update','+strUser'); !!}";--}}
        {{--    var exit = document.getElementById('exit');--}}
        {{--    var url = '{{ route("parking.update", ":id") }}';--}}
        {{--    url = url.replace(':id',product_id);--}}
        {{--    exit.action = action_src ;--}}
        {{--}--}}

        {{--$('input[type=submit]').on('click', function(event){--}}
        {{--    event.preventDefault();--}}
        {{--    var e = document.getElementById("car_id");--}}
        {{--    var id = e.value;--}}
        {{--    // console.log(id);--}}
        {{--    $('form').attr('action', "{{route('parking.update',"+id+")}}");--}}
        {{--    $('form').submit();--}}
        {{--});--}}
    </script>
{{--    <script>--}}
{{--        function exitForm() {--}}
{{--            alert('Validating form...');--}}
{{--            var c = document.getElementById('txtValue').value;--}}
{{--            text = escape(text);--}}
{{--            location.href = 'test.html?param=' + text;--}}
{{--            return false;--}}
{{--        }--}}
{{--    </script>--}}
@endsection
