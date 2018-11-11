@extends('layouts.app',['title' => 'Camps']) 
@section('content')

<div class="row bg-white p-5">
    <div class="flex w-full   py-2 border-b  ">
        <h4 class="flex-2">Camps</h4>
        <div class="flex-1  flex justify-end">
    @include('district',['type' => 'autochange'])


        </div>
    </div>

    @foreach ($camps as $camp)
    <article class="w-full py-4 border-b flex">

        <div class="flex-1">

            <h5>{{$camp->name}}</h5>
            <p><i data-feather="map-pin" class="mr-2"></i> {{$camp->location}}</p>
            <p><i data-feather="user" class="mr-2"></i> Total {{$camp->total}}</p>
            <p><i data-feather="phone" class="mr-2"></i> {{$camp->contact}} </p>
            <p><a href="https://www.google.com/maps/?q={{ $camp->map }}" target="_BLANK" class="el-button el-button--primary">   View on Google Map</a></p>
        </div>
        <div class="flex-1">
            <iframe src="https://maps.google.com/maps?q={{ $camp->map }}&hl=es;z=14&amp;output=embed" class="w-full h-full" style="
                    height: 220px;
                "></iframe>
        </div>
    </article>
    @endforeach

    <div class="flex flex-1 justify-center align-center mt-10">
        {{ $camps->appends(Illuminate\Support\Facades\Input::except('page'))->render()}}
    </div>

    @if (count($camps) ==0)

    <div class="alert  mt-4  alert-primary w-full" role="alert">
        <i data-feather="alert-triangle"></i> No relief camps available now!
    </div>
    @endif

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