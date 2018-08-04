@extends('layouts.app')
@section('content')
  @component('bs::jumbotron', ['fluid' => true])
      @slot('heading')
          503 網站目前進廠維護中
      @endslot
      @slot('subheading')
          沒什麼大事啦～例行維護嘛...您懂的...
      @endslot

      <hr class="my-3">
      <p>不就是改改程式，抓抓臭蟲...應該不用兩三天就好了啦！</p>
  @endcomponent
@endsection
