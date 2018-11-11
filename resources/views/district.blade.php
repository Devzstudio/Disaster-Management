<!-- Modify the below code for other districts -->
<!-- Start -->
@php ($districts = [ 'Alappuzha' , 'Ernakulam' , 'Idukki' , 'Kannur' , 'Kasaragod' , 'Kollam' , 'Kottayam' , 'Kozhikode',
'Malappuram' ,'Palakkad' , 'Pathanamthitta' ,'Thiruvananthapuram' ,'Thrissur' ,'Wayanad' ])

<!-- End -->


@php ( $districts = array_combine($districts, $districts)) @isset ($type) @if ($type == "autochange")

<div class="el-input el-input--suffix">
    {!! Form::select('district',$districts,'',[ 'class' => 'el-input__inner', 'onChange' => "choose(this.value)"]) !!}
    <span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-down"></i><!----><!----></span>
    </span>
</div>
@elseif($type =="value") {!! Form::select('district',$districts,$value,[ 'class' => 'el-input__inner','placeholder' => 'Choose
distict', 'required' => "required" ]) !!} @else


<div class="el-input el-input--suffix">
    {!! Form::select('district',$districts,'',[ 'class' => 'el-input__inner', 'required' => "required"]) !!} <span class="el-input__suffix"><span class="el-input__suffix-inner"><i class="el-select__caret el-input__icon el-icon-arrow-down"></i><!----><!----></span>
    <!---->
    </span>
</div>

@endif @else {!! Form::select('district',$districts,'',[ 'class' => 'el-input__inner','placeholder' => 'Choose distict',
'required' => "required" ]) !!} @endisset