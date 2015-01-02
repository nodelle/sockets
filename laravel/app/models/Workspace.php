<?php

class Workspace extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workspaces';

    /**
     * The fillable properties for the model.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The nodes relationship.
     *
     * @return mixed
     */
    public function nodes()
    {
        return $this->hasMany('Node');
    }

    /**
     * The user relationship.
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany('User', 'user_workspaces');
    }

}