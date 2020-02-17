@extends('layouts.app')

@section('content')
<new-product-form :categories="{{  json_encode($categories)  }}"></new-product-form>


<footer-vue></footer-vue>
@endsection
