@extends('layouts.admin') 
@section('content')


<div class="row">
    <div class="col-md-4">
        <a href="{{ url('admin/requests') }}">
            <div class="acard py-4 flex flex-row">
                <i class="flex-1 ml-5 text-5xl el-icon-phone-outline mb-3"></i>
                <h6 class="flex-2">
                    <p class="font-bold">{{$pending}}</p>
                    Pending Help Requests

                </h6>
            </div>
        </a>
    </div>



    <div class="col-md-4">
        <a href="{{ url('admin/volunteers') }}">

            <div class="acard py-4 flex flex-row justify-between ">
                <i class="flex-1 flex flex-start ml-4 text-5xl el-icon-user-outline mb-3" data-feather="users"></i>
                <h6 class="flex-2">
                    <p class="font-bold">{{$users}}</p>
                    Volunteers

                </h6>
            </div>
        </a>

    </div>


    <div class="col-md-4">
        <a href="{{ url('admin/camps') }}">

            <div class="acard py-4 flex flex-row justify-between ">
                <i class="flex-1 flex flex-start ml-4 text-5xl el-icon-user-outline mb-3" data-feather="home"></i>
                <h6 class="flex-2">
                    <p class="font-bold">{{$camps}}</p>
                    Relief Camps

                </h6>
            </div>
        </a>

    </div>



</div>


<div class='mt-10 w-full bg-white p-5'>
    <h5 class="mb-1">Help Requests</h5>
    <div id="no-more-tables">
        <table class="table table-striped table-bordered table-hover" id="tabledata">
            <div id="no-more-tables">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone </th>
                        <th>Map</th>
                        <th>Created At</th>
                        <th width="200px;">Actions</th>
                    </tr>

                </thead>

        </table>


        </div>
    </div>
@endsection
 
@section('js')
    <script>
        $( document ).ready(function() {
  
     $('#tabledata').DataTable({
        processing: true,
        serverSide: true,
        'bServerSide': true,        'bAutoWidth': false, 

        ajax: '{!! url('admin/data/requests') !!}',
        "columns": [
            {"data": "name"}, 
            {"data": "phone"}, 
            {"data": "map"}, 
            {"data": "created_at"}, 
            {"data": "actions", 'searchable': false}
        ],
        initComplete: function () {
            this.api().columns().every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
            });
        }
    });

});

    </script>
@endsection