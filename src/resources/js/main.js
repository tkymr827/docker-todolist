window.Vue = require('vue'); //vueを使えるようにする
window.axios = require('axios'); //axiosを使えるようにする

new Vue({
  el:"#header",
  data:{
    menu:false,
  }
})

new Vue({
  el:"#main",
  data:{
    todos:[],//取ってきたtodoを入れとく用
    loginuser:null, //loginしてる人の名前をとる
    privates:[], //自分しか見えないtodo格納用
    publics:[], //誰でも見えるtodo格納用
    modal:false,//modalのonoff
    hensyu:null,//

    sorts:[
      {btn:"ALL",status:null},
      {btn:"進行中",status:"bg-info"},
      {btn:"時間切れ",status:"bg-danger"},
      {btn:"完了",status:"bg-success"}
    ],
    isActive:null,
    

  },
  created:function(){
    axios.get("loginuser").then((response)=>{
      this.loginuser = response.data
    })
    .catch(nanimosinai=>{
      //何もしない
    })
    .then(()=>{
      let check = document.getElementById("get") //#getがあればDBからtodoを取ってくる
      if(check != null){
        this.gettodos()
      }
    })
  },
  methods:{
    sortcheck:function(index,sort){
      this.isActive = index
      let keep
      if(sort.status == null){//nullだったら全部表示
        keep = this.todos 
      }else{//statusに応じて分ける
       keep = this.todos.filter(x=>x.status == sort.status)
      }
      this.wakeru(keep)

    },
    gettodos:function(){ //DBから全要素取ってくる
      // axios.get("/gettodos").then((response)=>{
      axios.get("gettodos").then((response)=>{
        this.todos = response.data
        this.wakeru(this.todos)
      })
    },
    wakeru:function(todos){//取ってきたtodoを分ける
      this.privates=[]
      this.publics=[]

      todos.forEach(todo => {
        if(todo.delete == "1"){//0だったら表示　1は非表示
          return;
        }
        if(todo.release === "public"){ //公開設定別に分ける
          this.publics.push(todo)
        }else if(todo.release === "private" && todo.name === this.loginuser){
          this.privates.push(todo)
        }
      });
    },
    edittodo:function(id){
      this.hensyu = id
    },
    deletetodo:function(id){//todo削除
      let confirm = window.confirm("削除しますか？")
      if(confirm){
        axios.post("delete",{"id":id}).then(()=>{
          location.reload(true)
        })
      }
    },
    successtodo:function(id){//完了した時
      let confirm = window.confirm("タスク完了しましたか？")
      if(confirm){
        axios.post("success",{"id":id}).then(()=>{
          location.reload(true)
        })
      }
    },
    lumpdel:function(id){
      let confirm = window.confirm("表示されてるTodoを削除しますか?")
      if(confirm){
        axios.post("lumpdel",{"id":id}).then(()=>{
          location.reload(true)
        })
      }

    }
  }
})