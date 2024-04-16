@php
    $users = App\Models\User::all();

    $usersSortedByLikes = $users->sortByDesc(function ($user) {
        return $user->getTotalLikesCount();
    });

    $userWithMostLikes = $usersSortedByLikes->first();
@endphp

<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="{{(Route::is('dashboard')) ? 'text-white bg-success rounded' : 'text-dark'}} nav-link">
                    <span>{{__('codem.home')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('profile')}}" class="{{(Route::is('profile') || Route::is('problems.showAll') || Route::is('solutions.showAll') || Route::is('friendship.showFriends') || Route::is('friendship.showFriendRequests') || Route::is('users.edit')) ? 'text-white bg-success rounded' : 'text-dark'}} nav-link">
                    <span>{{__('codem.profile')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('terms')}}" class="{{(Route::is('terms')) ? 'text-white bg-success rounded' : 'text-dark'}} nav-link">
                    <span>{{__('codem.about_app')}}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-footer d-flex justify-content-evenly">
        <a href="{{route('lang', 'en')}}" style="color: rgb(52, 58, 64) "><h6>{{__('codem.english')}}</h6></a>
        <a href="{{route('lang', 'sr')}}" style="color: rgb(52, 58, 64)"><h6>{{__('codem.serbian')}}</h6></a>
    </div>
</div>

<div class="card mt-3 mb-3 p-3">
    <h4 style="text-align: center"><span class="bg-success">M</span>{{__('codem.user')}} <i style="color: orange;" class="fa-solid fa-trophy"></i></h4>
    
    <div class="d-flex align-items-center mt-2">
        <img src="{{$userWithMostLikes->getImageURL()}}" class="img-fluid rounded-circle" style="width: 25%" alt="">
        <strong class="ms-1"><a href="{{route('users.show',$userWithMostLikes->id )}}" style="color: rgb(52, 58, 64)">{{$userWithMostLikes->name }}</a></strong>
    </div>
</div>
