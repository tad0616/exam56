<dl>
    @forelse ($exam->topics as $key => $topic)
        <dt>
            <h3>
            @can('建立測驗')                
                <button type="button" class="btn btn-danger btn-del-topic" data-id="{{ $topic->id }}">刪除</button>
                <a href="{{route('topic.edit', $topic->id)}}" class="btn btn-warning">編輯</a>
                （{{$topic->ans}}）
            @endcan
            {{ bs()->badge()->text($key+1) }}
            {{$topic->topic}}
            </h3>
        </dt>
        <dd>
            {{ bs()->radioGroup("ans[$topic->id]", [
                    1=>"<span class='opt'>&#10102; $topic->opt1</span>",
                    2=>"<span class='opt'>&#10103; $topic->opt2</span>",
                    3=>"<span class='opt'>&#10104; $topic->opt3</span>",
                    4=>"<span class='opt'>&#10105; $topic->opt4</span>"
                ])->addRadioClass(['mx-3']) }}
        </dd>
    @empty
        <div class="alert alert-danger">尚無任何題目</div>
    @endforelse
</dl>