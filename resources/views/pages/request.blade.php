@extends('layouts.app',['title' => 'Request for help']) 
@section('content') {!! Form::open([ 'url' => 'request','class' =>
'form-horizontal']) !!}
<h3 class="mt-0 py-2 mt-1">Request for Help</h3>

<div class="mx-auto bg-white   px-5 w-4/4">

    <div class="  py-5">

        <span class="form-group flex" style="margin-right:0px">              
        <span class="flex flex-1 justify-start align-middle">
            {!! Form::label('name','Requestee Name' , ['class' => '']) !!}
         </span>
        <span class="flex flex-2">
        {!! Form::input('text','name','',[ 'class' => 'el-input__inner', 'required' => "required"]) !!}
    </span>
        </span>


        <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('phone','Requestee Phone' , ['class' => '']) !!}
             </span>
        <span class="flex flex-2">
            {!! Form::input('number','phone','',[ 'class' => 'el-input__inner', 'required' => "required" ]) !!}
        </span>
        </span>


        <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('reqOthers','Request for others' , ['class' => '']) !!}
             </span>
        <span class="flex flex-2 radio-list">
           
       <div> <input type="radio" name="reqOthers" value="0" class="radio" checked="checked"> No </div>
<div class="ml-10">   <input type="radio" name="reqOthers" value="1" class="ml-10 radio"> Yes  </div>
        </span>
        </span>




        <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('district','District' , ['class' => '']) !!}
             </span>
        <span class="flex flex-2">
    @include('district',['type' => 'form'])

    </span>
        </span>




        <span class="form-group flex" style="margin-right:0px">              
        <span class="flex flex-1 justify-start align-middle">
            {!! Form::label('location','Location' , ['class' => '']) !!}
         </span>
        <span class="flex flex-2 flex-column">
        {!! Form::input('text','location','',[ 'class' => 'el-input__inner', 'required' => "required" ,'runat' => 'server' , 'autocomplete' => 'on']) !!}

        <div class="help-block flex flex-row py-2 text-grey-dark" style="display:none;" id="showlat">
            <span class="flex flex-1">    Latitude: &nbsp;  <span id="lat"> </span> </span>
        <span class="flex flex-1">   Longitude: &nbsp;  <span id="lon"> </span> </span>

    </div>

    <input type="hidden" id="city2" name="city2" />
    <input type="hidden" id="cityLat" name="lat" />
    <input type="hidden" id="cityLng" name="lon" />


    </span>
    </span>




    <span class="form-group flex" style="margin-right:0px">              
        <span class="flex flex-1 justify-start align-middle">
            {!! Form::label('needs','Needs' , ['class' => '']) !!}
         </span>
    <span class="flex flex-2 flex-column space-between">



<div class="md:flex w-full mb-1 ">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="erescue" type="checkbox" onclick="showItem('erescue')" aria-hidden="true"  value="">  Need Rescue</div>
    <div class="flex-3" ><input type="text" name="rescue" style="display:none" id="e_eresuce" class="el-input__inner erescue" placeholder="Details for Rescue action"> </div>
      
</div>


<div class="md:flex w-full mb-1">
        <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="ewater" type="checkbox" onclick="showItem('ewater')" aria-hidden="true"  value="">  Water</div>
        <div class="flex-3" ><input type="text" name="water" style="display:none" id="e_eresuce" class="el-input__inner ewater" placeholder="Details for required Water"> </div>
</div>


<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="efood" type="checkbox" onclick="showItem('efood')" aria-hidden="true"  value="">  Food</div>
    <div class="flex-3" ><input type="text" name="food" style="display:none"   class="el-input__inner efood" placeholder="Details for required Food"> </div>
</div>




<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="eclothing" type="checkbox" onclick="showItem('eclothing')" aria-hidden="true"  value="">  Clothing</div>
    <div class="flex-3" ><input type="text" name="clothing" style="display:none"   class="el-input__inner eclothing" placeholder="Details for required Clothing"> </div>
</div>




<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="emedicine" type="checkbox" onclick="showItem('emedicine')" aria-hidden="true"  value="">  Medicine</div>
    <div class="flex-3" ><input type="text" name="medicine" style="display:none"   class="el-input__inner emedicine" placeholder="Details for required Medicine"> </div>
</div>





<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="ekitchen" type="checkbox" onclick="showItem('ekitchen')" aria-hidden="true"  value="">  Kitchen utensil</div>
    <div class="flex-3" ><input type="text" name="kitchen" style="display:none"   class="el-input__inner ekitchen" placeholder="Details for required Kitchen utensil"> </div>
</div>




<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">  <input class="mt-1 mr-1" id="etoiletries" type="checkbox" onclick="showItem('etoiletries')" aria-hidden="true"  value="">  Toiletries</div>
    <div class="flex-3" ><input type="text" name="toiletries" style="display:none"   class="el-input__inner etoiletries" placeholder="Details for required Toiletries"> </div>
</div>



<div class="md:flex w-full mb-1">
    <div class="flex-1 justify-start py-2 flex">   Other needs</div>
    <div class="flex-3" ><input type="text" name="other"  class="el-input__inner" placeholder="Other needs"> </div>
</div>




</span>
    </span>
    </span>


    <div class="form-grop flex justify-end">

        {!! Form::submit('Submit' , [ 'class' => 'el-button el-button--primary']) !!}
    </div>



</div>

</div>
{!! Form::close() !!}
@endsection
 
@section('js')
<script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>

<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
  
            document.getElementById('lat').innerHTML = '  ' + place.geometry.location.lat();
            document.getElementById('lon').innerHTML = '  ' + place.geometry.location.lng();
            document.getElementById("showlat").style.display = "";

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
   

    function showItem(name){
          if(document.getElementById(name).checked) 
        { 
             $('.'+name).show();
             $('.'+name).attr("required", "required");

        } else { 
            $('.'+name).hide();
            $('.'+name).removeAttr("required");
        }
     }

</script>
@endsection