<?php

class Controller_Home extends Controller
{
    public function action_index()
    {
        //変数としてビューを割り当てる
        $view = View::forge('template/index'); //テンプレートとなるビューファイルの読込み
        $view->set('head',View::forge('template/head'));
        $view->set('contents',View::forge('home/content'));
        $view->set('footer',View::forge('template/footer'));
        $view->set_global('username','usernamedesu');
        //テンプレートビューの中でさらに読み込んだビューの中にある変数へ値を渡したい場合はset_globalを使う。
        //テンプレートビューの中で使う変数へ値を渡すだけならsetでいい。

        // レンダリングした HTML をリクエストに返す
        return $view;
    }
}

