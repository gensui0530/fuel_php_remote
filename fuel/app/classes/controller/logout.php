<?php

class Controller_Logout extends Controller
{
    public function action_index()
    {
        $btn = Form::submit('logoutbotton', 'Logout', array('style' => 'text-aline:center', 'method' => 'POST'));

        if (Input::method() === 'POST') {
            $auth = Auth::instance();
            if($auth->logout()){

            Response::redirect('signup');
                
            }
        }
            //変数としてビューを割り当てる
            $view = View::forge('template/index');
            $view->set('head', View::forge('template/head'));
            $view->set('header', View::forge('template/header'));
            $view->set('contents', View::forge('auth/logout'));
            $view->set('footer', View::forge('template/footer'));
            $view->set_global('logoutbutton', $btn, false);


            // レンダリングした HTML をリクエストに返す
            return $view;
        
        }
    }