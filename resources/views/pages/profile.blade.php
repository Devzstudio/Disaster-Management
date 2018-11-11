@extends('layouts.app') 
@section('content')

<div class="bg-white p-5">

    {!! Form::open([ 'url' => 'profile','class' => 'form-horizontal']) !!}


    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('phone','Phone' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
            {!! Form::text('phone',Auth::user()->phone,[  'class' => 'el-input__inner', 'required' => "required"]) !!}
        </span>
    </span>



    <span class="form-group flex" style="margin-right:0px">              
            <span class="flex flex-1 justify-start align-middle">
                {!! Form::label('location','Location' , ['class' => '']) !!}
             </span>
    <span class="flex flex-2">
    @include('district',['type' => 'value' , 'value' => Auth::user()->location])

    </span>
    </span>

    <div class="form-grop flex justify-end">
        {!! Form::submit('Submit' , [ 'class' => 'el-button el-button--primary']) !!}
    </div>
    {!! Form::close() !!}



</div>
@endsection