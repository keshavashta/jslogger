<?php
/**
 * Created by JetBrains PhpStorm.
 * User: naveen
 * Date: 25/1/13
 * Time: 12:34 AM
 * To change this template use File | Settings | File Templates.
 */
class User_Controller extends Base_Controller
{
    public function action_login()
    {
        return View::make('user.login');
    }

    public function action_post_login()
    {
        $data = Input::json();

        if (empty($data))
            return Response::make("Error", Constants::BAD_REQUEST_CODE);

        $credentials = array(
            'username' => $data->email,
            'password' => $data->password
        );

        if (Auth::attempt($credentials)) {
            return Response::json(
                array(
                    'status' => true,
                    'url' => URL::to('/')
                )
            );
        } else
            return Response::json(array(
                'status' => false
            ));
    }

    public function action_logout()
    {
        Auth::logout();
        return Redirect::home();
    }


}
