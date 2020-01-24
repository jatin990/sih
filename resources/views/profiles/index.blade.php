@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 p-5">
                 <div class="panel-heading">alumni Dashboard</div>
                   
                 
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-50">
    

                        <div class="font-weight-bold">
                            {{$user->profile->url }}
                            {{$user->college }}
                        </div>

                    USer profile
                @auth('web')
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
    
                   <div>
                               @can('update', $user->profile)
                                   <a href="{{ $user->id }}/connect">get connected</a>
                               @endcan
               
                   </div>
                    <div>
                               @can('update', $user->profile)
                                   <a href="{{ $user->id }}/events">events</a>
                               @endcan
               
                   </div>
                @endauth
                                
    <div class="panel-body">
           @if($user->profile->rejected ===1)
           <div class="alert alert-danger">Your profile was rejected by the admins!! provide or edit some extra info for better recognition</div>
                  <button
                    type="button"
                    class="btn btn-sm btm-secondary font-weight-bold"
                    data-toggle="modal"
                    data-target="#feedback"
                  >
                    feedback
                  </button>
                  <div
                    class="modal fade"
                    id="feedback"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="feedbackuser"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="feedbackuser"> Feedback</h5>

                          <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                          >
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-warning font-weight-light">
                                {{$user->profile->feedback}}
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                           @elseif($user->profile->verified !==1)
                              <div class="alert alert-danger">the user is not verified</div>
    
        @auth('c_admin')
        <form action="{{route('profile.verify',['c_admin'=>auth()->user()->id,'user'=>$user->id,])}}" method="post">
         @csrf
        @method('PATCH')
       <button class="btn btn-primary">verify</button>
       </form>


    <button
    type="button"
    class="btn btn-primary"
    data-toggle="modal"
    data-target="#verifyalumni"
>reject
</button>
<div
    class="modal fade"
    id="verifyalumni"
    tabindex="-1"
    role="form"
    aria-labelledby="verify"
    aria-hidden="true"
>
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verify">Do you want to provide some feedback</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



               <form action="{{route('profile.reject',['c_admin'=>auth()->user()->id,'user'=>$user->id,])}}" method="post">
                       @csrf
                     @method('PATCH')
                    <div class="form-group">
                        <label for="feedback" class="col-form-label"
                            > Message:</label
                        >
                        <textarea
                            class="form-control"
                            id="feedback"
                            name="feedback"
                            placeholder="optional"
                        ></textarea>
                    </div>
                
            
            <div class="modal-footer">
                 <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                 </div>
                 <div class="ml-3">
                     <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                >
                    Close
                </button>
                 </div>
                    
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
    @endauth
@endif

@endsection
