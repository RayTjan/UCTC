@extends('layouts.app')
@section('title', 'Profile')
@section('content')

    <div class="row justify-content-center align-items-center containerCustom">

        <div class="text-center shadow-sm profile-box">
            <div class="miniOption position-relative">
                <div class="iconOptionCenter position-absolute">
                    <a href="{{ route('user.user.edit', $user) }}" class="iconOption">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <form action="{{ route('logout')}}" method="POST" class="d-inline-block">
                        {{ csrf_field() }}
                        <button type="submit" class="btnA iconOptionB">
                            <i class="fa fa-power-off"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="heightProfile"></div>
            <div class="rounded-circle profilePic" style=" background-repeat:no-repeat;
                background-position: center;
                background-image:url(

            @if($user->picture != null)
                /img/userpic/{{$user->picture}}
            @else
                https://www.mgretails.com/assets/img/default.png
            @endif

            );
                background-size: cover;">
            </div>
            <div class="heightName">
                <div>
                    <h4 class="font-weight-bold">{{$user->identity->name}}</h4>
                    <p style="font-size: 12px;" class="mb-0">uh ah ah eh wowoo woaoawo dkaokdoakodkasadasdadssadsad</p>
                </div>
            </div>
            <div class="social">
                <div class="iconCenter">
                    <div class="iconProfile dropdown">
                    <a class="dropbtn">
                        <i class="fa fa-envelope"></i>
                    </a>

                    <div class="dropdown-content">
                        <div class="dropdown-item" >{{$user->email}}</div>
                    </div>
                    </div>

                    <div class="iconProfile dropdown">
                        <a class="dropbtn">
                            <i class="fa fa-phone"></i>
                        </a>

                        <div class="dropdown-content">
                            <div class="dropdown-item" >081357160052</div>
                        </div>
                    </div>

                    <div class="iconProfile dropdown mr-0">
                        <a class="dropbtn">
                            <i class="fa fa-address-book"></i>
                        </a>

                        <div class="dropdown-content">
                            <div class="dropdown-item" >Griya Sono Indah</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
