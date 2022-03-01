@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">投稿内容編集</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('Post.update', ['id' => $post->id]) }}">
                    @csrf
                    <table class="table">
                    @error('title')<p>{{ $message }}</p>@enderror
                    @error('body')<p>{{ $message }}</p>@enderror
                      <tr>
                        <th>タイトル</th>
                        <td><input class="form-control" type="text" name="title" value={{ $post->title }}></td>
                      </tr>
                      <tr>
                        <th>本文</th>
                        <td><textarea class="form-control" name="body">{{ $post->body }}</textarea></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td><input class="btn btn-secondary" type="submit" value="編集"></td>
                      </tr>
                    </table>
                  </form>
                </div>
                <a href="{{ route('Posts') }}">一覧画面に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection