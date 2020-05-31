@extends("layouts.base")
@section("title","ホーム")

@section("content")
<div id="get">
    <div class="search">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary" v-for="(sort,index) in sorts" :class="isActive == index ? 'active' : ''">
                <input type="radio" name="options" id="option1" @click="sortcheck(index,sort)"> @{{sort.btn}}
            </label>
        </div>
    </div>
    @auth
    <div class="common">
        <div class="title">
            <h1>自分の投稿</h1>
            <button @click="lumpdel(private)">表示されてる自分のTodoを一括削除</button>
        </div>
        <transition-group class="card-deck" name="list">
            <div class="card text-white" :class="private.status" v-for="(private,index) in privates" :key="index">
                <div class="card-header">
                    <p>投稿者:@{{private.name}} </p>
                    <div class="times">
                        <div class="deadline" v-if="private.deadline">完了期限:@{{private.deadline}}</div>
                        完了日:@{{private.complite}}
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">@{{private.taskname}}</h5>
                    <p class="card-text">@{{private.content}}</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" @click="edittodo(private); modal =! modal">編集</button>
                    <button class="btn btn-warning" @click="deletetodo(private.id)">削除</button>
                    <button class="btn btn-success" @click="successtodo(private.id)">完了</button>
                </div>
            </div>
        </transition-group>
    </div>
    @endauth
    <div class="common">
        <div class="title">
            <h1>誰でも見れる</h1>
            @auth
            <button @click="lumpdel(publics)">表示されてるTodoを一括削除</button>
            @endauth
        </div>
        <transition-group class="card-deck" name="list">
            <div class="card text-white" :class="public.status" v-for="(public,index) in publics" :key="index">
                <div class="card-header">
                    <p>投稿者:@{{public.name}} </p>
                    <div class="times">
                        <div class="deadline" v-if="public.deadline">完了期限:@{{public.deadline}}</div>
                        完了日:@{{public.complite}}
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">@{{public.taskname}}</h5>
                    <p class="card-text">@{{public.content}}</p>
                </div>
                @auth
                <div class="card-footer">
                    <button class="btn btn-primary" @click="edittodo(public); modal =! modal">編集</button>
                    <button class="btn btn-warning" @click="deletetodo(public.id)">削除</button>
                    <button class="btn btn-success" @click="successtodo(public.id)">完了</button>
                </div>
                @endauth
            </div>
        </transition-group>
    </div>

    <div class="modal" v-if="modal == true">
        <div class="modal__content">
            <button class="modal__content-close" @click="modal = false">閉じる</button>
            <h1>Todo編集</h1>
            <div class="modal__content-form">
                <form method="POST" action="edit">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" :value="hensyu.id">
                    <div class="form-group row">
                        <label for="taskname" class="col-sm-2 col-form-label">タスク名<small>※</small></label>
                        <div class="col-sm-10">
                            <input type="text" name="taskname" id="taskname" class="form-control"
                                placeholder="タスク名を入力してください" required :value="hensyu.taskname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">内容<small>※</small></label>
                        <div class="col-sm-10">
                            <textarea name="content" id="content" class="form-control" cols="20" rows="10" required
                                :value="hensyu.content"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deadline" class="col-sm-2 col-form-label">完了期日</label>
                        <div class="col-sm-10">
                            <input type="date" name="deadline" class="form-control" :value="hensyu.deadline">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="complite" class="col-sm-2 col-form-label">完了日<small>※</small></label>
                        <div class="col-sm-10">
                            <input type="date" name="complite" class="form-control" required :value="hensyu.complite">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="release" class="col-sm-2 col-form-label">公開設定<small>※</small>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check custom-control-inline">
                                <label for="public" class="form-check-label">Public</label>
                                <input type="radio" name="release" class="form-check-input" id="public" value="public"
                                    required>
                            </div>
                            <div class="form-check custom-control-inline">
                                <label for="private" class="form-check-label">Private</label>
                                <input type="radio" name="release" class="form-check-input" id="private"
                                    value="private">
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-lg btn-primary">登録する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection