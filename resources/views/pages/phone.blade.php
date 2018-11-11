@extends('layouts.app',['title' => 'Camps']) 
@section('content')

<div class="row bg-white p-5">
    <div class="flex w-full">
        <h4 class="flex-2">Contact Info</h4>
        <div class="flex-1 flex justify-end">
    @include('district',['type' => 'autochange'])


        </div>
    </div>


    <table class="table table-bordered table-responsive table-striped mt-4 table-hover">
        <thead>
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Number</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phones as $phone)
            <tr>
                <td>{{$phone->position}}</td>
                <td>{{$phone->name}}</td>
                <td>{{$phone->number}}</td>
                <td>{{$phone->location}}</td>
            </tr>
            @endforeach @if (count($phones) == 0)
            <tr>
                <td colspan="4"> Currenly, there is no phone number in the directory. </td>
            </tr>
            @endif
        </tbody>


    </table>

    <div class="flex flex-1 justify-center align-center mt-10">

        {{ $phones->appends(Illuminate\Support\Facades\Input::except('page'))->render() }}
    </div>
@endsection
 
@section('js')
    <script>
        function choose(dist){
    var url = window.location.href + '?district='+dist;
    window.location.href = url;

}
    </script>
@endsection