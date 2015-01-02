<?php

class AuthController extends BaseController {

    /**
     * The base html layout.
     *
     * @var string
     */
    protected $layout = 'layouts.base';

    public function __construct(
        Nodelle\Auth\AuthInterface $auth
    ){
        $this->auth = $auth;
    }

    public function login()
    {
        $this->layout->nest('content', 'auth.login');
    }

    public function postLogin()
    {
        $input = Input::except('_token');

        if (Validation::make('login', $input)->passes()) {
            $remember = ! empty($input['remember']);
            $this->auth->login($input, $remember);

            return Redirect::route('home.index');
        } else {
            return Redirect::back()->withInput()->withErrors(Validation::errors());
        }
    }

    public function register()
    {
        $this->layout->nest('content', 'auth.register');
    }

    public function postRegister()
    {
        $input = Input::except('_token');

        if (Validation::make('register', $input)->passes()) {
            $this->auth->register($input, true);

            return Redirect::route('auth.index');
        } else {
            return Redirect::back()->withInput()->withErrors(Validation::errors());
        }
    }

    public function logout()
    {
        $this->auth->logout();

        return Redirect::route('home.index');
    }

} 