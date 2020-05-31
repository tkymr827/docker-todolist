# TodoList 機能詳細
ログインしていない状態だと閲覧のみ可能。
ログインしていると投稿、編集、削除が可能になる。
# DEMO
![enter image description here](https://i.imgur.com/80ViHQu.gif)
# 要件
* Docker 19.03.8
* Laravel 7.4.0
* Vue 2.6.11
* Axios 0.19.2
* Bootstrap 4.4.1
# 使い方
アカウントを作成orログインして投稿ページからTodoを作成できる。
投稿時に公開設定を**Public**にすれば全ユーザーが閲覧でき、**Private**にすれば自分のみ閲覧可能になる。
またPrivateに設定された自分の投稿はマイページからも確認可能。

### 表示されてるTodoの色について
* 水色:進行中
* 赤色:完了日が過ぎている
* 緑色:完了済み
