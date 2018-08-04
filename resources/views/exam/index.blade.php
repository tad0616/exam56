@extends('layouts.app') 
@section('content')
    <h1>測驗一覽</h1>
    <ul class="list-group">
            @forelse($exams as $exam)
                <li class="list-group-item">
                    {{ $exam->created_at->format("Y年m月d日") }} -
                    <a href="exam/{{ $exam->id }}">
                        {{ $exam->title }}
                    </a>
                </li>
            @empty
                <li class="list-group-item">尚無任何測驗</li>
            @endforelse
        </ul>
@endsection

@section('my_menu')
    <li><a class="nav-link" href="/home">我的選項</a></li>
    @parent
@stop