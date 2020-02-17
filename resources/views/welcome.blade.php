@extends('layouts.app')
@section('content')
<?php $active=true;  ?>
    <div class="justify-content-center">
            <home-map :products="{{$profiles}}" :categories="{{$categories}}"></home-map>
    </div>
<div class=" category-container ">
    <div class="row container ">
    <div class="row">
{{--     <div class="  col-sm-12 padding-categories"><h3>Categorias</h3></div>

            @foreach($categories as $category)
                <div class="col-sm-3">
                    <div class="card ">
                        <div class="card-header">{{$category->title}}</div>
                        <div class="card-body">
                            <img src="images/{{$category->image}}" class="rounded mx-auto d-block"alt="{{$category->title}}">
                            {{$category->description}}
                            <call-to-action :number="{{32}}"><img src="images/{{$category->icon}}" width="32" alt="{{$category->title}}"></call-to-action>

                        </div>
                    </div>
                </div>
            @endforeach--}}
        </div>
    </div>
</div>

        <footer-vue>

        </footer-vue>
@endsection
