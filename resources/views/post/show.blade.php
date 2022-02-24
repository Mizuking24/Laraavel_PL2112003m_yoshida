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
        </div>
    </div>
</div>
@endsection