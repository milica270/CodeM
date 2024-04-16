<div>
    @auth()
        @if(Auth::user()->likesSolution($solution))
            <form action="{{route('solutions.unlike', $solution->id)}}" method="POST">
                @csrf
                <button type="submit" style="border: none; background-color: white;"><i class="fa-solid fa-heart"></i> {{$solution->likes()->count()}}</button>
            </form>
        @else
            <form action="{{route('solutions.like', $solution->id)}}" method="POST">
                @csrf
                <button type="submit" style="border: none; background-color: white;"><i class="fa-regular fa-heart"></i> {{$solution->likes()->count()}}</button>
            </form>
        @endif
    @endauth
    @guest()
        <a href="{{route('login')}}" style="text-decoration: none; color: rgb(52, 58, 64)"><i class="fa-regular fa-heart"></i> {{$solution->likes()->count()}}</a>
    @endguest
</div>

