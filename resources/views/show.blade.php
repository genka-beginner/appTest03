@extends('layouts.app')

@section('title','書籍詳細')

@section('content')

<form action="{{ url('books')}}" method="post" class="row">

<!-- トークンを自動発行し受け取り側で認証を行う -->
{{ csrf_field() }}
@include('common.errors')

<div class="form-group col-md-12 col-xs-12">
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-book"></i>　書籍名</div>
    </div>
    <input disabled class="form-control bg-light"  style="font-size:24px"  value="{{ $book->item_name }}">
  </div>
</div>
<div class="form-group col-md-12 col-xs-12">
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-money"></i>　購入数</div>
    </div>
    <input disabled class="form-control bg-light"  style="font-size:24px"  value="{{ $book->item_purchase }}冊">
  </div>
</div>
<div class="form-group col-md-12 col-xs-12">
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-money"></i>　料　金</div>
    </div>
    <input disabled class="form-control bg-light"  style="font-size:24px"  value="{{ number_format($book->item_amount) }}円">
  </div>
</div>
<div class="form-group col-md-12 col-xs-12">
  <div class="input-group mb-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-calendar-o"></i>　販売日</div>
    </div>
    <input disabled  class="form-control bg-light"  style="font-size:24px"  value="{{ date('Y年m月d日 H時i分s秒', strtotime($book->published) ) }}">
  </div>
</div>
  <div class="form-group col-12">
    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-lg btn-block">
      <i class="fa fa-mail-reply"></i>　一覧に戻る
    </a>
  </div>
</form>

@endsection
