@extends('layouts.app') 
@section('content')
    <h1 class="text-center">{{$exam->title}}</h1>

    <div class="text-center">
        發佈於 {{$exam->created_at->format("Y年m月d日 H:i:s")}} / 最後更新： {{$exam->updated_at->format("Y年m月d日 H:i:s")}}
    </div>
@endsection