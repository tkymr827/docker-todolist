@extends("layouts.base")
@section("title","マイページ")
@section("content")
@auth
<div id="get">
    <div class="search">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-secondary" v-for="(sort,index) in sorts" :class="isActive == index ? 'active' : ''">
                <input type="radio" name="options" id="option1" @click="sortcheck(index,sort)"> @{{sort.btn}}
            </label>
        </div>
    </div>
    <div class="common">
        <div class="title">
            <h1>自分の投稿</h1>
            <button @click="lumpdel(private)">表示されてる自分のTodoを一括削除</button>
        </div>

        <transition-group class="card-deck" name="list">
            <div class="card text-white" :class="private.status" v-for="(private,index) in privates" :key="private.id">
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
</div>
@endauth
@endsection