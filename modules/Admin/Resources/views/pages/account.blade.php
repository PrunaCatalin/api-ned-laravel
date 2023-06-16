<?php
/**
 * File Name: ${NAME}
 * Author: pruna
 * Created: 6/10/2023
 *
 * License:
 * --------------
 * SC WEBDIRECT TEHNOLOGIES SRL
 *
 * Change Log:
 * --------------
 * Date         | Author         | Description
 * 6/10/2023 | pruna | Initial version
 *
 */
dd($errors);
?>
@extends('admin::layouts.master')

@section('content')
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="met-profile">
                        <div class="row">
                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                <div class="met-profile-main">
                                    <div class="met-profile-main-pic">
                                        <img src="images/user-4.jpg" alt height="110" class="rounded-circle">
                                        <span class="met-profile_main-pic-change">
                                            <i class="fas fa-camera"></i>
                                       </span>
                                    </div>
                                    <div class="met-profile_user-detail">
                                        <h5 class="met-user-name">{{ $account->name }}</h5>
                                        <p class="mb-0 met-user-name-post">UI/UX {{ $account->currentRole() }}, India</p>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4 ms-auto align-self-center">
                                <ul class="list-unstyled personal-detail mb-0">
                                    <li class><i class="las la-phone mr-2 text-secondary font-22 align-middle"></i>
                                        <b> {{ trans("admin::forms.admin.form.phone") }} </b> : {{ $account->userDetails->phone }}
                                    </li>
                                    <li class="mt-2">
                                        <i class="las la-envelope text-secondary font-22 align-middle mr-2"></i>
                                        <b> {{ trans("admin::forms.admin.form.email") }} </b> : {{ $account->email }}
                                    </li>
                                    <li class="mt-2">
                                        <i class="las la-globe text-secondary font-22 align-middle mr-2"></i>
                                        <b> {{ trans("admin::forms.admin.form.website") }} </b> :
                                        <a href="{{ $account->userDetails->website }}" class="font-14 text-primary">
                                            {{ $account->userDetails->website }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end f_profile-->
                </div>
                <!--end card-body-->
                <div class="card-body p-0">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="Settings" role="tabpanel">
                            <div class="row">
                                <form action="{{ route('admin.action.account.settings') }}" method="POST" class="d-flex">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-lg-6 col-xl-6">

                                        <div class="card">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title">Personal Information</h4>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-header-->
                                        <div class="card-body">
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.full-name") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text"  name="full_name" value="{{ $account->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.nif") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" name="nif" value="{{ $account->userDetails->nif }}">

                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.full-address") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="text" name="full_address" value="{{ $account->userDetails->address }}">

                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.contact-phone") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="las la-phone"></i></span>
                                                        <input type="text" class="form-control" name="phone"
                                                               value="{{ $account->userDetails->phone }}"
                                                               placeholder=" {{ trans("admin::forms.admin.form.full-address") }}" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.email-address") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="las la-at"></i></span>
                                                        <input type="email" class="form-control" value="{{ $account->email }}" placeholder="Email" aria-describedby="basic-addon1" readonly>
                                                    </div>
                                                    <span class="form-text text-muted font-12">We'll never share your email with anyone else.</span>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.website") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="la la-globe"></i></span>
                                                        <input type="text" class="form-control" name="website"
                                                               value="{{ $account->userDetails->website }}" placeholder="https://www.example.com" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans("admin::forms.admin.form.country") }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <select class="form-select" name="country">
                                                       @foreach($countries as $country)
                                                           @if($country['id'] === $account->userDetails->country_id)
                                                                <option value="{{ $country['id'] }}" selected>{{ $country['name'] }}</option>
                                                           @else
                                                                <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                                           @endif
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                    <button type="submit" class="btn btn-de-primary">
                                                        {{ trans("admin::forms.admin.form.save") }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--end col-->
                                    <div class="col-lg-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                {{ trans('admin::forms.admin.form.change-password')  }}
                                            </h4>
                                        </div>
                                        <!--end card-header-->
                                        <div class="card-body">
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans('admin::forms.admin.form.current-password')  }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" name="current_password"
                                                           placeholder="*******" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans('admin::forms.admin.form.new-password')  }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" name="new_password"
                                                           placeholder="*******" value="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                    {{ trans('admin::forms.admin.form.confirm-password')  }}
                                                </label>
                                                <div class="col-lg-9 col-xl-8">
                                                    <input class="form-control" type="password" name="confirm_password"
                                                           placeholder="*******" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                    <div class="card" style="height: 50%">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                {{ trans('admin::messages.admin.view.account.settings.other-settings') }}
                                            </h4>
                                        </div>
                                        <!--end card-header-->
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value id="Email_Notifications"
                                                {{ ($account->notificationPreferences->email_preference) ? "checked" : ""  }}>
                                                <label class="form-check-label" for="Email_Notifications">
                                                    {{ trans('admin::messages.admin.view.account.settings.email-notification') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value id="SMS_Notifications"
                                                    {{ ($account->notificationPreferences->sms_preference) ? "checked" : ""  }}>
                                                <label class="form-check-label" for="SMS_Notifications">
                                                    {{ trans('admin::messages.admin.view.account.settings.sms-notification') }}
                                                </label>
                                            </div>
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <!-- end col -->
                                </form>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

@endsection

