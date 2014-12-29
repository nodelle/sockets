<?php

class HomeController extends BaseController {

    /**
     * The base html layout
     *
     * @var string
     */
    protected $layout = 'layouts.base';

    /**
     * Display the home page
     *
     * @return void
     */
    public function index()
    {
        $this->layout->nest('content', 'home.index');
    }

}
