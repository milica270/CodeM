@if($problem->solutions->count()>0)
    <div class="mt-3">
        <h5 class="mb-2">{{__('codem.solutions')}}</h5>
        @foreach($problem->solutions as $solution)
            <div class="mb-2 d-flex flex-column">
                <div class="d-flex align-items-center">
                    <img src="/images/{{ $solution->user->image }}" class="img-fluid rounded-circle" style="width: 10%" alt="">
                    <strong class="ms-1"><a href="{{route('users.show',$solution->user->id)}}" style="color: rgb(52, 58, 64)">{{$solution->user->name}}</a></strong>
                </div>
                <pre class="ms-5">{{$solution->content}}</pre>
                <div class="d-flex justify-content-between">
                    @include('solutions.like-button')
                    <div style="text-align: right"><i class="fa-solid fa-clock"></i> {{$solution->created_at->diffForHumans()}}</div>
                </div>
            </div>
        @endforeach
    </div>
@endif