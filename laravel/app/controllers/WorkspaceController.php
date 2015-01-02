<?php

class WorkspaceController extends BaseController {

    public function __construct(
        Nodelle\Auth\AuthInterface $auth
    ){
        $this->auth = $auth;
    }

    /**
     * The base html layout
     *
     * @var string
     */
    protected $layout = 'layouts.base';

    public function index()
    {
        $this->layout->nest('content', 'workspace.index', [
            'user' => $this->auth->getUser(),
        ]);
    }

    public function show($id)
    {
        $user = $this->auth->getUser();

        JavaScript::put([
            'user' => $user->toArray(),
            'workspaces' => $user->workspaces->toArray()
        ]);

        $this->layout->nest('content', 'workspace.layout', [
            'content' => View::make('workspace.partials.show', [
                'workspace' => Workspace::find($id),
                'user' => $this->auth->getUser(),
            ]),
            'user' => $this->auth->getUser(),
        ]);
    }

} 