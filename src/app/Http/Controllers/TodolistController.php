<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ユーザー名を取るため
use App\Todolist;

// use Request;

class TodolistController extends Controller
{
    //

    public function loginuser()
    {
        return Auth::user()->name;
    }

    public function post(Request $request)
    {
        $Todolist = new Todolist();

        $Todolist->create([
            "name" => Auth::user()->name,
            "taskname" => $request->taskname,
            "content" => $request->content,
            "deadline" => $request->deadline,
            "complite" => $request->complite,
            "release" => $request->release,
        ]);

        // $Todolist->save();

        // return redirect("/");
        // return view("index");
        return redirect("/");
    }

    public function get()
    {
        $datas = Todolist::get();
        $now = time(); //今の時間取得

        foreach ($datas as $data) {

            $finish = strtotime($data->complite);
            $time = $finish - $now;
            if ($data["status"] == "bg-success") { //終了
                continue;
            } elseif ($time > 0) {              //進行中
                $data["status"] = "bg-info";
            } else {                            //時間切れ
                $data["status"] = "bg-danger";
            }
        }

        return $datas;
    }

    public function edit(Request $request)
    {
        // $edit = Todolist::findorfail($request->id);
        $todolist = Todolist::findorfail($request->id);
        $todolist->taskname = $request->input("taskname");
        $todolist->content = $request->input("content");
        $todolist->deadline = $request->input("deadline");
        $todolist->complite = $request->input("complite");
        $todolist->release = $request->input("release");
        $todolist->save();
        return redirect("/");
    }

    public function delete(Request $request)
    {
        $todolist = Todolist::findorfail($request->id);
        $todolist->delete = 1;
        $todolist->save();
        return;
        // return $request->id;
    }

    public function success(Request $request)
    {
        $todolist = Todolist::findorfail($request->id);
        $todolist->status = "bg-success";
        $todolist->save();
        return;
    }

    public function lumpdel(Request $request)
    {
        // $lumps = $request->test;
        foreach ($request->test as $data) {
            // $lump[] = $data["id"];
            $todolist = Todolist::findorfail($data["id"]);
            $todolist->delete = 1;
            $todolist->save();
        }


        return;
    }
}
