@extends('layouts.app')

@section('title','Profile Settings')

@section('content')
<div class="card border-0 shadow shadow-md">
    <div class="card-body">
        <div class="row container mb-3">
            <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="row container mb-3">
            <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
        <div class="row container">
            <div class="card">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
