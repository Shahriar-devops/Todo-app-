@extends('backend.profile.master')
@section('title',__('profile.title'))
@section('breadcrumb')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ __('profile.title') }}</h4>
            </div>
        </div>
    </div>
@endsection
@section('profilecontent')
<div id="my-posts" class="tab-pane fade active show">
    <div class="my-post-content pt-3">
        <div class="post-input">
            <textarea name="textarea" id="textarea" cols="30" rows="5"
                class="form-control bg-transparent"
                placeholder="Please type what you want...."></textarea> <a
                href="javascript:void()"><i class="ti-clip"></i> </a>
            <a href="javascript:void()"><i class="ti-camera"></i> </a><a
                href="javascript:void()" class="btn btn-primary">Post</a>
        </div>
        <div class="profile-uoloaded-post border-bottom-1 pb-5">
            <img src="{{asset('backend')}}/images/profile/8.jpg" alt="" class="img-fluid">
            <a class="post-title" href="javascript:void()">
                <h4>Collection of textile samples lay spread</h4>
            </a>
            <p>A wonderful serenity has take possession of my entire soul
                like these sweet morning of spare which enjoy whole heart.A
                wonderful serenity has take possession of my entire soul
                like these sweet morning
                of spare which enjoy whole heart.</p>
            <button class="btn btn-primary mr-3"><span class="mr-3"><i
                        class="fa fa-heart"></i></span>Like</button>
            <button class="btn btn-secondary"><span class="mr-3"><i
                        class="fa fa-reply"></i></span>Reply</button>
        </div>
        <div class="profile-uoloaded-post border-bottom-1 pb-5">
            <img src="{{asset('backend')}}/images/profile/9.jpg" alt="" class="img-fluid">
            <a class="post-title" href="javascript:void()">
                <h4>Collection of textile samples lay spread</h4>
            </a>
            <p>A wonderful serenity has take possession of my entire soul
                like these sweet morning of spare which enjoy whole heart.A
                wonderful serenity has take possession of my entire soul
                like these sweet morning
                of spare which enjoy whole heart.</p>
            <button class="btn btn-primary mr-3"><span class="mr-3"><i
                        class="fa fa-heart"></i></span>Like</button>
            <button class="btn btn-secondary"><span class="mr-3"><i
                        class="fa fa-reply"></i></span>Reply</button>
        </div>
        <div class="profile-uoloaded-post pb-5">
            <img src="{{asset('backend')}}/images/profile/8.jpg" alt="" class="img-fluid">
            <a class="post-title" href="javascript:void()">
                <h4>Collection of textile samples lay spread</h4>
            </a>
            <p>A wonderful serenity has take possession of my entire soul
                like these sweet morning of spare which enjoy whole heart.A
                wonderful serenity has take possession of my entire soul
                like these sweet morning
                of spare which enjoy whole heart.</p>
            <button class="btn btn-primary mr-3"><span class="mr-3"><i
                        class="fa fa-heart"></i></span>Like</button>
            <button class="btn btn-secondary"><span class="mr-3"><i
                        class="fa fa-reply"></i></span>Reply</button>
        </div>
        <div class="text-center mb-2"><a href="javascript:void()"
                class="btn btn-primary">Load More</a>
        </div>
    </div>
</div>
@endsection
