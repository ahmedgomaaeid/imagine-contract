@foreach ($array_photos as $photo)
    <img src="{{route('index')}}/assets/images/{{$photo}}" style="width:50%">
@endforeach