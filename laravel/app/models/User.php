<?php

class User extends Cartalyst\Sentry\Users\Eloquent\User {

    public function workspaces()
    {
        return $this->belongsToMany('Workspace', 'user_workspaces');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
