@extends('layouts.blank')
@section('content')

    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <h1>Verify Email</h1>
                    <p>You have to verify your email address to access this page</p>
                    <form action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block">Resend verification email</button>
                        </div>

                        @include('partials.alerts')

                    </form>
                </div>
                <ul class="auth-footer">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="#">Help</a>
                    </li>
                    <li>
                        <a href="#">Terms</a>
                    </li>
                </ul>
                <p class="footer-text text-center">copyright © 2021 FawaTech. All rights reserved.</p>
                <p class="footer-text text-center text-center">Laravel User Management system from<a href="https://www.hsnww.com/" target="_blank"> FawaTech </a></p>
            </div>
        </div>
    </div>

    @endsection
