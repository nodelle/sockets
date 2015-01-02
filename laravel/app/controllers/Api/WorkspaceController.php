<?php namespace Api;

use Node;
use Nodelle;
use Input;

class WorkspaceController extends \Controller {

    public function newNode($id)
    {
        $node = Node::create(['name' => 'Node', 'content' => 'Example Node', 'workspace_id' => $id]);

        Nodelle::send([
            'topic' => 'nodelle.workspace.' . $id,
            'event' => 'node.new',
            'id' => $node->id,
            'name' => $node->name,
            'content' => $node->content,
            'top' => $node->top,
            'left' => $node->left,
        ]);
    }

    public function updateNode($id, $nodeId)
    {
        Node::find($nodeId)->update(['top' => Input::get('top'), 'left' => Input::get('left')]);
        $node = Node::find($nodeId);

        Nodelle::send([
            'topic' => 'nodelle.workspace.' . $id,
            'event' => 'node.update',
            'id' => $node->id,
            'name' => $node->name,
            'content' => $node->content,
            'top' => $node->top,
            'left' => $node->left,
        ]);
    }

} 