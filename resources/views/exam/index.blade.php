@extends('layouts.app') 
@section('content')
    <h1>測驗一覽<small>（共 {{$exams->total()}} 筆資料）</small></h1>
    <ul class="list-group">
        @forelse($exams as $exam)
            <li class="list-group-item">
                @if($exam->enable!=1)
                    {{ bs()->badge()->text('關閉') }}
                @endif
                {{ $exam->created_at->format("Y年m月d日") }} -
                <a href="exam/{{ $exam->id }}">
                    {{ $exam->title }}
                </a>
            </li>
        @empty
            <li class="list-group-item">尚無任何測驗</li>
        @endforelse
    </ul>
    <div class="my-3">
        {{ $exams->links() }}
    </div>
@endsection

@section('my_menu')
    <li><a class="nav-link" href="/home">我的選項</a></li>
    @parent
@stop