<?php

class Node extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $layout = 'nodes';

    /**
     * Set the fillable properties for the model.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'left', 'top'];

    /**
     * The workspace relationship
     *
     * @return mixed
     */
    public function workspace()
    {
        return $this->belongsTo('Workspace');
    }

} 