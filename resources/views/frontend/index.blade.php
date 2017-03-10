@extends('frontend.layouts.master')
@section('style')
<style type="text/css">
    .image {
        background-size: cover;
    }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Welcome Tsani to Your Feed!</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    @foreach($data as $key => $value)
        @if($key % 4 == 1 || $key == 1)
        <div class="row">
        @endif
            <div class="col-lg-3 col-md-6">
                <!-- <div class="col-md-12");"> -->
                    <strong><center><span class="fa fa-pencil"></span> CAPTION : {{html_entity_decode($value['caption'])}}</center></strong>
                <!-- </div> -->
                <!-- <div class="col-md-12" style="background-image: url({{$value['image']->url}});width:250px;height:250px;background-size:cover;"> -->
                    @if($value['type'] == 'image')
                    <img src="{{$value['image']->url}}" width="100%" class="img-responsive">
                    @else
                    <iframe width="100%" src="{{$value['video']->url}}?controls=0">
                    </iframe>
                    @endif
                    <br>
                    <hr>
                    <center>
                        <strong>
                            <p>Posted At : {{$value['created_at']}}</p>
                        </strong>
                    </center>
                    <!-- <div class="image"  ></div> -->
                <!-- </div> -->
            </div>
        @if($key % 4 == 0)
        </div>
        <hr>
        <hr>
        @endif
    @endforeach
</div>
<!-- /.row -->
@stop