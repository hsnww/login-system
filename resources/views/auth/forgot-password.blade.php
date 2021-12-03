@extends('layouts.blank')
@section('content')

    <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
            <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="label">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your email to retrieve password">
                                <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary submit-btn btn-block">Reset password</button>
                        </div>
                        @include('partials.alerts')
                        <div class="form-group d-flex justify-content-between">
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                            </div>
                        </div>
                        <div class="text-block text-center my-3">
                            <span class="text-small font-weight-semibold">Not a member ?</span>
                            <a href="{{route('register')}}" class="text-black text-small">Create new account</a>
                        </div>
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
