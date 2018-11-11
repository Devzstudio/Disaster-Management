@extends('layouts.admin',['title' => 'Add Camp']) 
@section('content')

<div class="row flex mb-1c">
    <div class="flex-1  py-2 align-middle">

        <div aria-label="Breadcrumb" role="navigation" class="el-breadcrumb"><span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/') }}">Dashboard</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/camps') }}">Camps</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner">New Camp</span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>


        </div>

    </div>

</div>


<div class="bg-white p-5">

    {!! Form::open([ 'url' => 'admin/camps/add','class' => 'form-horizontal']) !!}


    <span class="form-group flex" style="margin-right:0px">              
        <span class="flex flex-1 justify-start align-middle">
            {!! Form::label('name','Name' , ['class' => '']) !!}
         </span>
    <span class="flex flex-2">
        {!! Form::text('name','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
    </span>
    </span>



    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('location','Location' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('location','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>




    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('map','Latitude, Longitude' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('map','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>



    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('district','District' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
    @include('district')

        </span>
    </span>




    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('address','Address' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::textarea('address','',[ 'style' => 'height:80px','class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>


    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('contact','Contact Number' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('contact','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>




    <div class="form-group float-right">
        {!! Form::submit('Submit' , [ 'class' => 'el-button el-button--primary']) !!}
    </div>





    {!! Form::close() !!}
</div>
@endsection
 
@section('js')
<script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
             document.getElementById('map').value = place.geometry.location.lat()+','+place.geometry.location.lng();
   
    

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);

</script>
@endsection