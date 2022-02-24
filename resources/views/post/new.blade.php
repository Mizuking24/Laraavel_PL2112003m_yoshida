@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('Post.create') }}">
                    @csrf
                    <table class="table">
                      <tr>
                        <th>タイトル</th>
                        <td><input class="form-control" type="text" name="title" placeholder="タイトル"></td>
                      </tr>
                      <tr>
                        <th>本文</th>
                        <td><textarea class="form-control" name="body" placeholder="本文"></textarea></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td><input class="btn btn-secondary" type="submit" value="投稿"></td>
                      </tr>
                    </table>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection