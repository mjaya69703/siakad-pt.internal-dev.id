@extends('base.base-dash-index')
@section('title')
    Talent Management - Siakad By Internal Developer
@endsection
@section('menu')
    Errors
@endsection
@section('submenu')
    Errors Authorization
@endsection
@if (Auth::check())
    @section('urlmenu')
        {{ route($prefix . 'home-index') }}
    @endsection
@else
@endif
@section('subdesc')
    Errors Pages Authorization
@endsection
@section('content')
    @if (Str::is('error/verify', request()->path()))
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-right-to-bracket"></i> ReFresh</a>
                </span>
            </div>
            <div class="card-body">
                <span class="text-white" style="font-size: 20px">Your account is not verify. please wait</span>
            </div>
        </div>
        {{-- PAGES FOR ERROR ACCESS --}}
    @elseif(Str::is('error/access', request()->path()))
        <div class="card mb-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span style="font-size: 20px">{{ $submenu }}</span>
                <span class="align-items-center">
                    <a href="" class="btn btn-outline-warning btn-rounded"><i class="fa-solid fa-right-to-bracket"></i> ReFresh</a>
                </span>
            </div>
            <div class="card-body">
                <span class="text-white" style="font-size: 20px">Your account cant access this pages. Please back to <a href="/" class="text-danger">Home</a></span>
            </div>
        </div>
        {{-- END IF --}}
    @endif
@endsection
