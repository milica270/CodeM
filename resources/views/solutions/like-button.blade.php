<div>
    @auth()
        @if(Auth::user()->likesSolution($solution))
        <button id="like-button" class="d-none" onclick="like({{$solution->id}})" style=" border: none; background-color: white;"><i class="fa-regular fa-heart"></i> <span id="like-count-2"> {{$solution->likes()->count()}}</span></button>

        <button  id="unlike-button" onclick="unlike({{$solution->id}})" style="border: none; background-color: white;"><i class=" fa-solid fa-heart"></i> <span id="like-count-1">{{$solution->likes()->count()}}</span></button>
        @else
        <button  id="unlike-button" class="d-none" onclick="unlike({{$solution->id}})" style="border: none; background-color: white;"><i class=" fa-solid fa-heart"></i> <span id="like-count-1">{{$solution->likes()->count()}}</span></button>
            <button  id="like-button" onclick="like({{$solution->id}})" style="border: none; background-color: white;"><i class="fa-regular fa-heart"></i> <span id="like-count-2">{{$solution->likes()->count()}}</span></button>
        @endif
    @endauth
    @guest()
        <a href="{{route('login')}}" style="text-decoration: none; color: rgb(52, 58, 64)"><i class="fa-regular fa-heart"></i> {{$solution->likes()->count()}}</a>
    @endguest
</div>

<script>
    function like(arg){
    console.log(arg);
    $.ajax({
        url: '{{route('solutions.like')}}',
        type: "post",
        data: ({solution_id: arg}),
        dataType: "json",
        success: function (data) {
          console.log(data);
          console.log("success");
          document.getElementById('like-button').classList.add('d-none');
          document.getElementById('unlike-button').classList.remove('d-none');
          document.getElementById('like-count-1').innerHTML = parseInt(document.getElementById('like-count-1').innerHTML)+1;
          document.getElementById('like-count-2').innerHTML = parseInt(document.getElementById('like-count-2').innerHTML)+1;
        },
        error: function (data) {
            console.log(data);
        }
    });
    }
    function unlike(arg){
    console.log(arg);
    $.ajax({
        url: '{{route('solutions.unlike')}}',
        type: "post",
        data: ({solution_id: arg}),
        dataType: "json",
        success: function (data) {
          console.log(data);
          console.log("success");
          document.getElementById('unlike-button').classList.add('d-none');
          document.getElementById('like-button').classList.remove('d-none');
          document.getElementById('like-count-2').innerHTML = parseInt(document.getElementById('like-count-2').innerHTML)-1;
          document.getElementById('like-count-1').innerHTML = parseInt(document.getElementById('like-count-1').innerHTML)-1;
        },
        error: function (data) {
            console.log(data);
        }
    });
}
</script>

