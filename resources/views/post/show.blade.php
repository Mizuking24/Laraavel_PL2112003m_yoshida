@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">投稿詳細</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>記事ID</th>
                    <td>{{ $post->id }}</td>
                  </tr>
                  <tr>
                    <th>タイトル</th>
                    <td>{{ $post->title }}</td>
                  </tr>
                  <tr>
                    <th>本文</th>
                    <td>{!! nl2br(e($post->body)) !!}</td>
                  </tr>
                  <tr>
                    <th>投稿者</th>
                    <td>{{ $user->name }}</td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="card">
              <div class="card-header">コメント</div>

              <div class="card-body">
                <table class="table">
                  @foreach($comments as $comment)
                  <tr>
                    <th>投稿者ID</th>
                    <th>コメント</th>
                  </tr>
                  <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->comment }}</td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>

            <form method="POST" action="{{ route('Comment.create', ['id' => $post->id]) }}">
              @csrf
              <table class="table">
                <tr>
                  @error('comment')<p>{{ $message }}</p>@enderror
                  <th><input class="form-control" type="text" name="comment" placeholder="コメント"></th>
                  <td><input class="btn btn-secondary" type="submit" value="コメントする"></td>
                </tr>
              </table>
            </form>
        </div>
    </div>
</div>
@endsection