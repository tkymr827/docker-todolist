@extends("layouts.base")
@section("title","投稿ページ")
@section("content")
<div class="postpage">
    <h1>投稿ページ</h1>
    <div class="form">
        <form method="POST" action="add">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="taskname" class="col-sm-2 col-form-label">タスク名<small>※</small></label>
                <div class="col-sm-10">
                    <input type="text" name="taskname" id="taskname" class="form-control" placeholder="タスク名を入力してください"
                        maxlength="50" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">内容<small>※</small></label>
                <div class="col-sm-10">
                    <textarea name="content" id="content" class="form-control" cols="20" rows="10" maxlength="200"
                        required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="deadline" class="col-sm-2 col-form-label">完了期日</label>
                <div class="col-sm-10">
                    <input type="date" name="deadline" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="complite" class="col-sm-2 col-form-label">完了日<small>※</small></label>
                <div class="col-sm-10">
                    <input type="date" name="complite" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="release" class="col-sm-2 col-form-label">公開設定<small>※</small>
                </label>
                <div class="col-sm-10">
                    <div class="form-check custom-control-inline">
                        <label for="public" class="form-check-label">Public</label>
                        <input type="radio" name="release" class="form-check-input" id="public" value="public" required>
                    </div>
                    <div class="form-check custom-control-inline">
                        <label for="private" class="form-check-label">Private</label>
                        <input type="radio" name="release" class="form-check-input" id="private" value="private">
                    </div>
                </div>
            </div>
            <div class="button">
                <button type="submit" class="btn btn-lg btn-primary">登録する</button>
            </div>
        </form>
    </div>
</div>
@endsection