@extends('layouts.app') 
@section('content')

<div class="bg-white p-5">
    <div class="flex w-full   mb-3 border-b  ">
        <h4 class="flex-2">Help Requests</h4>

    </div>
    <div id="no-more-tables">

        <table class="table table-striped table-responsive w-100 d-block d-md-table table-bordered table-hover" id="tabledata">
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
    $(document).ready(function() {
  
     $('#tabledata').DataTable({
        processing: true,
        serverSide: true,
        'bServerSide': true,   
        'bAutoWidth': false, 
        ajax: '{!! url('user/data/requests') !!}',
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
















@stop