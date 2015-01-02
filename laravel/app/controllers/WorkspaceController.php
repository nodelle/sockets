<?php

class WorkspaceController extends BaseController {

    public function show($id)
    {
        $workspaces = Workspace::all();
        $workspace = Workspace::where('id', $id)->with('nodes')->first();

        JavaScript::put([
            'workspaces' => $workspaces->toArray(),
            'workspace' => $workspace->toArray(),
        ]);

        return View::make('workspace.index');
    }

} 