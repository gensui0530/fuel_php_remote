<?php

class Controller_Login extends Controller
{
    const PASS_LENGTH_MIN = 6;
    const PASS_LENGTH_MAX = 20;

    public function action_index()
    {
        $error = '';



        $form = Fieldset::forge('loginform');


        $form->add('email', 'Email', array('type' => 'email', 'placeholder' => 'Email'))
            ->add_rule('required')
            ->add_rule('valid_email')
            ->add_rule('min_length', 1)
            ->add_rule('max_length', 255);


        $form->add('password', 'Password', array('type' => 'password', 'placeholder' => 'Password'))
            ->add_rule('required')
            ->add_rule('min_length', self::PASS_LENGTH_MIN)
            ->add_rule('max_length', self::PASS_LENGTH_MAX);

        $form->add('submit', '', array('type' => 'submit', 'value' => 'Login'));

        //Input::method()でHTTPメソッドが返ってくるので、POSTかどうか確認
        if (Input::method() === 'POST') {
            //バリデーションインスタンスを取得
            $val = $form->validation();
            if ($val->run()) {
                $formData = $val->validated();
                $auth = Auth::instance(); //Authインスタンス生成
                if ($auth->login($formData['email'], $formData['password'])) {
                    //メッセージの格納
                    Session::set_flash('sucMsg', 'ログインしました！');
                    //リダイレクト
                    Response::redirect('logout');
                } else {
                    //メッセージ格納
                    Session::set_flash('errMsg', 'ログインに失敗しました！');
                }
            } else {
                //エラー格納
                $error = $val->error();
                //メッセージ格納
                Session::set_flash('errMsg', 'ユーザー登録に失敗しました！');
            }

            // フォームにPOSTされた値をリセット
            $form->repopulate();
        }

        //変数としてビューを割り当てる
        $view = View::forge('template/index');
        $view->set('head', View::forge('template/head'));
        $view->set('header', View::forge('template/header'));
        $view->set('contents', View::forge('auth/login'));
        $view->set('footer', View::forge('template/footer'));
        $view->set_global('loginform', $form->build(''), false);
        $view->set_global('error', $error);

        //レンダリングしたHTMLをリクエストに返す
        return $view;
    }
}
