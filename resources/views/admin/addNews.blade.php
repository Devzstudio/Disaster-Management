@extends('layouts.admin',['title' => 'Add Announcements']) 
@section('content')

<div class="row flex mb-1c">
    <div class="flex-1  py-2 align-middle">

        <div aria-label="Breadcrumb" role="navigation" class="el-breadcrumb"><span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/') }}">Dashboard</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner is-link"><a href="{{ url('admin/news') }}">Announcements</a></span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>
            <span class="el-breadcrumb__item"><span role="link" class="el-breadcrumb__inner">New Announcement</span>
            <i class="el-breadcrumb__separator el-icon-arrow-right"></i>
            </span>


        </div>

    </div>

</div>


<div class="bg-white p-5">

    {!! Form::open([ 'url' => 'admin/news/add','class' => 'form-horizontal']) !!}


    <span class="form-group flex" style="margin-right:0px">              
        <span class="flex flex-1 justify-start align-middle">
            {!! Form::label('message','Message' , ['class' => '']) !!}
         </span>
    <span class="flex flex-2">
        {!! Form::textarea('message','',[ 'style' => 'height:150px','class' => 'el-input__inner', 'required' => "required"]) !!}
    </span>
    </span>
    <div class="form-group float-right">
        {!! Form::submit('Submit' , [ 'class' => 'el-button el-button--primary']) !!}
    </div>


    {!! Form::close() !!}
</div>
@endsection