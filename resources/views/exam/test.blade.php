@extends('layouts.app')
@section('content')
    <h1 class="text-center">{{$test->exam->title}}</h1>
    <h3 class="row">
        <div class="col-sm-6">時間：<u>{{$test->created_at->format("Y年m月d日 H:i:s")}}</u></div>
        <div class="col-sm-6 text-right">姓名：<u>{{$test->user->name}}</u> 得分：<u>{{$test->score}}</u></div>   
    </h3>
    <hr>

    <dl>
        @forelse ($content as $key => $data)
            <dt>
                <h3>            
                    @if($data['ans']==$data['topic']->ans)
                        <img src="{{asset('yes.png')}}" alt="yes" title="正確答案為 {{$data['topic']->ans}}">
                    @else
                        <img src="{{asset('no.png')}}" alt="no" title="正確答案為 {{$data['topic']->ans}}">
                    @endif
                    {{ bs()->badge()->text($key+1) }}
                    （{{$data['ans']}}）
                    {{$data['topic']->topic}}
                </h3>
            </dt>
            
            <dd>
                <div class="ml-5 my-2 opt">
                    &#10102; {{$data['topic']->opt1}}
                </div>
                <div class="ml-5 my-2 opt">
                    &#10103; {{$data['topic']->opt2}}
                </div>
                <div class="ml-5 my-2 opt">
                    &#10104; {{$data['topic']->opt3}}
                </div>
                <div class="ml-5 my-2 opt">
                    &#10105; {{$data['topic']->opt4}}
                </div>
            </dd>
        @empty
            <div class="alert alert-danger">尚無任何題目</div>
        @endforelse
    </dl>

@endsection
