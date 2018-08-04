@extends('layouts.app') 
@section('content')
    <h1 class="text-center">
        {{$exam->title}}
        
        @can('建立測驗')
            <button type="button" class="btn btn-danger btn-del-exam" data-id="{{ $exam->id }}">刪除</button>
            <a href="{{route('exam.edit', $exam->id)}}" class="btn btn-warning">編輯</a>
        @endcan
    </h1>

    @can('建立測驗')
        @if(isset($topic))
            {{ bs()->openForm('patch', "/topic/{$topic->id}", ['model' => $topic]) }}
        @else
            {{ bs()->openForm('post', '/topic') }}
        @endif
            {{ bs()->formGroup()
                    ->label('題目內容', false, 'text-sm-right')
                    ->control(bs()->textarea('topic')->placeholder('請輸入題目內容'))
                    ->showAsRow() }}
            {{ bs()->formGroup()
                    ->label('選項1', false, 'text-sm-right')
                    ->control(bs()->text('opt1')->placeholder('輸入選項1'))
                    ->showAsRow() }}
            {{ bs()->formGroup()
                    ->label('選項2', false, 'text-sm-right')
                    ->control(bs()->text('opt2')->placeholder('輸入選項2'))
                    ->showAsRow() }}
            {{ bs()->formGroup()
                    ->label('選項3', false, 'text-sm-right')
                    ->control(bs()->text('opt3')->placeholder('輸入選項3'))
                    ->showAsRow() }}
            {{ bs()->formGroup()
                    ->label('選項4', false, 'text-sm-right')
                    ->control(bs()->text('opt4')->placeholder('輸入選項4'))
                    ->showAsRow() }}
            {{ bs()->formGroup()
                    ->label('正確解答', false, 'text-sm-right')
                    ->control(bs()->select('ans',[1=>1, 2=>2, 3=>3, 4=>4])->placeholder('請設定正確解答'))
                    ->showAsRow() }}
            {{ bs()->hidden('exam_id', $exam->id) }}
            {{ bs()->formGroup()
                    ->label('')
                    ->control(bs()->submit('儲存'))
                    ->showAsRow() }}
        {{ bs()->closeForm() }}
    @endcan

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

    <div class="text-center">
        發佈於 {{$exam->created_at->format("Y年m月d日 H:i:s")}} / 最後更新： {{$exam->updated_at->format("Y年m月d日 H:i:s")}}
    </div>
@endsection

@section('scriptsAfterJs')
    <script>
        $(document).ready(function() {
            // 刪除按鈕點擊事件
            $('.btn-del-topic').click(function() {
                // 獲取按鈕上 data-id 屬性的值，也就是編號
                var id = $(this).data('id');
                // 調用 sweetalert
                swal({
                    title: "確定要刪除題目嗎？",
                    text: "刪除後該題目就消失救不回來囉！",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "是！含淚刪除！",
                    cancelButtonText: "不...別刪",
                }).then((result) => {
                    if (result.value) {
                        swal("OK！刪掉題目惹！", "該題目已經隨風而逝了...", "success");
                        // 調用刪除介面，用 id 來拼接出請求的 url
                        axios.delete('/topic/' + id).then(function () {
                            location.reload();
                        });
                    }
                });
            });

            // 刪除按鈕點擊事件
            $('.btn-del-exam').click(function() {
                // 獲取按鈕上 data-id 屬性的值，也就是編號
                var id = $(this).data('id');
                // 調用 sweetalert
                swal({
                    title: "確定要刪除測驗嗎？",
                    text: "刪除後該測驗連同所有題目就消失救不回來囉！",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "是！含淚刪除！",
                    cancelButtonText: "不...別刪",
                }).then((result) => {
                    if (result.value) {
                        swal("OK！刪掉測驗惹！", "該測驗所有資料已經隨風而逝了...", "success");
                        // 調用刪除介面，用 id 來拼接出請求的 url
                        axios.delete('/exam/' + id).then(function () {
                            location.href='/exam';
                        });
                    }
                });
            });
        });
    </script>
@endsection