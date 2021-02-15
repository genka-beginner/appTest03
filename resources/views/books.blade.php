<!Doctype html>
<head>
    <meta charset="UTF-8">
    <title>タイトル</title>
</head>
<body>
    @extends('layouts.app')

<!-- 1行で指定することも可能 -->
@section('title','購入書籍一覧')

@section('content')
@if(session('success'))
  <div class="alert alert-success text-center font-weight-bold">
    {{ session('success') }}
  </div>
  @elseif(session('update'))
  <div class="alert alert-info text-center font-weight-bold">
    {{ session('update') }}
  </div>
@endif

  <table class="table table-bordered table-striped task-table table-hover">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>書籍名</th>
        <th>購入数</th>
        <th>料金</th>
        <th>販売日時</th>
        <th>削除</th>
        <th>編集</th>
      </tr>
    </thead>
    <body>
      @foreach ($books as $book)
      <tr>
        <td>{{ $book->id }}</td>
        <td><a href="{{url('books/'.$book->id.'/show')}}" class="text-dark">{{ $book->item_name }}</a></td>
        <td>{{ $book->item_purchase }} 冊</td>
        <td>{{ number_format($book->item_amount) }}円</td>
        <td>{{ $book->published }}</td>
        <td>
            <form action="{{url('books/'.$book->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="method" class="btn btn-secondary">
              <i class="fa fa-trash"></i> 削除
            </button>
            </form>
        </td>
        <td>
            <form action="{{url('books/'.$book->id.'/edit')}}" method="get">
            {{csrf_field()}}
            <button type="method" class="btn btn-secondary">
              <i class="fa fa-pencil"></i> 編集
            </button>
            </form>
        </td>
      </tr>
      @endforeach
    </body>
  </table>
  <tfoot>
    <tr>
      <td colspan="7" class="bg-light pb-0">
        {{ $books -> links() }}
      </td>
    </tr>
  </tfoot>
@endsection

{{ Debugbar::debug($book) }}
</body>
