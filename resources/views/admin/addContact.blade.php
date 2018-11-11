@extends('layouts.admin',['title' => 'Add Contact']) 
@section('content')

<div class="row flex mb-1c">
    <div class="flex-1  py-2 align-middle">

        <div aria-label="Breadcrumb" role="navigation" class="el-breadcrumb"><span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/') }}">Dashboard</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/contacts') }}">Contacts</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner">New Contact</span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>


        </div>

    </div>

</div>


<div class="bg-white p-5">

    {!! Form::open([ 'url' => 'admin/contact/add','class' => 'form-horizontal']) !!}


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
                {!! Form::label('number','Contact Number' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('number','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>


    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('district','Location' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
    @include('district')

        </span>
    </span>

    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('position','Position' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('position','',[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>



    <div class="form-group float-right">
        {!! Form::submit('Submit' , [ 'class' => 'el-button el-button--primary']) !!}
    </div>





    {!! Form::close() !!}
</div>
@endsection