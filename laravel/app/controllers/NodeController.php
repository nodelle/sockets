<?php

class NodeController {


    public function create($id)
    {
        $workspace = Workspace::find($id);

        dd($workspace);
    }

} 