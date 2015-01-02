<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.base';

    public function __construct(
        Nodelle\Auth\AuthInterface $auth
    ){
        $this->auth = $auth;
    }

    /**
     * Display the home page
     *
     * @return void
     */
    public function index()
    {
        if ($this->auth->check()) {
            return $this->dashboard();
        }

        $this->layout->nest('content', 'home.index');
    }

    public function dashboard()
    {
        $user = $this->auth->getUser();

        JavaScript::put([
            'user' => $user->toArray(),
            'workspaces' => $user->workspaces,
        ]);

        return View::make('dashboard.index');
    }

}
