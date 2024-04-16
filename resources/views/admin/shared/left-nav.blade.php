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
                <a href="{{route('admin.dashboard')}}" class="{{(Route::is('admin.dashboard')) ? 'text-white bg-success rounded' : 'text-dark'}} nav-link">
                    <span>{{__('codem.home')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.users')}}" class="{{(Route::is('admin.users')) ? 'text-white bg-success rounded' : 'text-dark'}} nav-link">
                    <span>{{__('codem.users')}}</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-footer d-flex justify-content-evenly">
        <a href="{{route('lang', 'en')}}" style="color: rgb(52, 58, 64) "><h6>{{__('codem.english')}}</h6></a>
        <a href="{{route('lang', 'sr')}}" style="color: rgb(52, 58, 64)"><h6>{{__('codem.serbian')}}</h6></a>
    </div>
</div>

