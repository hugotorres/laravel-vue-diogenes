@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic text-center float-center">
                    <img src="/uploads/profile/{{$user->foto}}" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                           {{$profile->text}}


                        </div>
                        <div class="profile-usertitle-job">
                            {{$user->whatsapp}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->

                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu ">
                        <ul class="nav">
                            <li class="active">
                                <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                            </li>
                            <li>
                                <a href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END MENU -->

                    <div class="portlet light bordered">
                                                        <!-- STAT -->
                                                        <div class="row list-separated profile-stat">
                                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                                <div class="uppercase profile-stat-title"> {{$profile->rating}} </div>
                                                                <div class="uppercase profile-stat-text"> Rating </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                                <div class="uppercase profile-stat-title"> {{$profile->gender}} </div>
                                                                <div class="uppercase profile-stat-text"> Genero </div>
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                                <div class="uppercase profile-stat-title"> {{$profile->age}} </div>
                                                                <div class="uppercase profile-stat-text">Age </div>
                                                            </div>
                                                        </div>
                                                        <!-- END STAT -->
                                                        <div>
                                                            <h4 class="profile-desc-title">Acerca de {{$user->name}}</h4>
                                                                <span class="profile-desc-text">{{$profile->description}}</span>
                                                            <div class="margin-top-20 profile-desc-link">
                                                                <i class="fa fa-globe"></i>
                                                                <a href="https://www.apollowebstudio.com">{{$profile->url}}</a>
                                                            </div>

                                                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-9">
                <div class="profile-content">
                    @if($user->rol==="bitch")
                        <new-product-form  :profile="{{  json_encode($profile)  }}" :categories="{{  json_encode($categories)  }}"></new-product-form>
                     @else
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 review-box">
                                    <h2>Review</h2>
                                    <div class="review">
                                        review long tex1
                                    </div>
                                </div>
                                <div class="col-sm-6 review-box">
                                    <h2>Review</h2>
                                    <div class="review">
                                        review long tex1
                                    </div>
                                </div>
                                <div class="col-sm-6 review-box">
                                    <h2>Review</h2>
                                    <div class="review ">
                                        review long tex1
                                    </div>
                                </div>
                            </div>
                        </div>


                     @endif
                </div>
            </div>
        </div>
    </div>


    <footer-vue></footer-vue>
@endsection
