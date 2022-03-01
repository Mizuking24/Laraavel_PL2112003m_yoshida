@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="card">
              <div class="card-header">投稿一覧</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>記事ID</th>
                    <th>タイトル</th>
                    <th>本文</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <td></td>
                    <td></td>
                  </tr>
                  @foreach($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ route('Post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
                    <td>{!! nl2br(e($post->body)) !!}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    @if($post->user_id === $user)
                      <td><a href="{{ route('Post.edit', ['id' => $post->id]) }}">編集</a></td>
                      <td>
                        <form method="POST" action="{{ route('Post.destroy', ['id' => $post->id]) }}">
                          @csrf
                          <input type="submit" value="削除" onclick="window.confirm('{{ $post->title }}');">
                        </form>
                      </td>
                    @endif
                  </tr>
                  @endforeach
                </table>
              </div>
              <p>累計登録者数{{ $userCount->count() }}人/月</p>
              <p>累計投稿数{{ $postCount->count() }}件/月</p>
          </div>
        </div>
    </div>
</div>
@endsection