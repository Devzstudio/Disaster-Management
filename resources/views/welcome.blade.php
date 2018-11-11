@extends('layouts.app') 
@section('content')

<div class="row bg-white rounded md:flex p-5 mb-5">
    <div class="flex-2 py-20">
        <h3>The right team in the right place at the right time with the right knowledge, right skills & the right logistics</h3>
    </div>
    <div class="md:flex-1"><img src="{{ url('images/home.png') }}" style="width:300px;"></div>

</div>

<div class="row mb-4">

    <div class="col-md-4">
        <a href="{{ url('request') }}">
            <div class="el-card is-hover-shadow">
                <div class="el-card__body card-contents flex flex-column justify-center align-center text-center">
                    <i class="el-icon-phone-outline mb-3"></i>
                    <h4 class="font-normal"> Request for Help</h4>
                </div>
            </div>
        </a>
    </div>



    <div class="col-md-4">
        <a href="{{ url('camps') }}">
            <div class="el-card is-hover-shadow">
                <div class="el-card__body card-contents flex flex-column justify-center align-center text-center">
                    <i class="feather" data-feather="home"></i>
                    <h4 class="font-normal">Relief Camps</h4>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-4">
        <a href="{{ url('contacts') }}">
            <div class="el-card is-hover-shadow">
                <div class="el-card__body card-contents flex flex-column justify-center align-center text-center">
                    <i class="feather" data-feather="phone"></i>
                    <h4 class="font-normal">Contact Info</h4>
                </div>
            </div>
        </a>
    </div>


</div>


<div class="row">
    <div class="col-md-4">
        <a href="{{ url('announcements') }}">
            <div class="el-card is-hover-shadow">
                <div class="el-card__body card-contents flex flex-column justify-center align-center text-center">
                    <i class="feather" data-feather="bell"></i>
                    <h4 class="font-normal">Announcements</h4>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-4">
        <a href="{{ url('register') }}">
            <div class="el-card is-hover-shadow">
                <div class="el-card__body card-contents flex flex-column justify-center align-center text-center">
                    <i class="feather" data-feather="users"></i>
                    <h4 class="font-normal">Volunteer Register / Login</h4>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection