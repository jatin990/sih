@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
             <div class="panel-heading">alumni Dashboard</div>
fuckersssssssss
                <div class="panel-body">
                    @if($user->profile->verified !==1)
the user is not verified
@auth('c_admin')
<form action="/verify/{{ $user->id }}" method="post">
        @csrf
        @method('PATCH')
<button class="btn btn-primary">verify</button>
</form>
@endauth
@elseif($user->profile->verified ===1  ||auth()->user() == 'c_admin')
        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50">
        {{-- <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50"> --}}
        {{-- <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3"> --}}
                    {{-- <div class="h4">{{ $user ?? ''->username }}</div> --}}

                    {{-- <follow-button user-id="{{ $user ?? ''->id }}" follows="{{ $follows }}"></follow-button> --}}
                </div>

                {{-- {{-- @can('update', $user ?? ''->profile) --}}
                    {{-- <a href="/p/create">Add New Post</a> --}}
                {{-- @endcan --}} --}}


                    <div class="font-weight-bold">
                        {{$user->profile->url ?? 'yeahhhhhh'}}
                    </div>

                USer profile fuckaaa
            {{-- </div> --}}


            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
{{-- 
            <div class="d-flex">
                <div class="pr-5"><strong>{postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{followingCount }}</strong> following</div>
            </div> --}}
            {{-- <div class="pt-4 font-weight-bold">{{ $user ?? ''->profile->title }}</div>
            <div>{{ $user ?? ''->profile->description }}</div>
            <div><a href="#">{{ $user ?? ''->profile->url }}</a></div>
        </div>
    </div> --}}

    {{-- <div class="row pt-5">
        @foreach($user ?? ''->posts as $post)
            <div class="col-4 pb-4">
                {{-- <a href="/p/{{ $post->id }}"> --}}
                    {{-- <img src="/storage/{{ $post->image }}" class="w-100"> --}}
                {{-- </a> --}}
            {{-- </div>
        @endforeach
    </div>
</div> --}} --}}
@endif
@endsection
