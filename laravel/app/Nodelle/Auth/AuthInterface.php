<?php namespace Nodelle\Auth;

interface AuthInterface {

    /**
     * Check if a user is signed in.
     *
     * @return bool
     */
    public function check();

    /**
     * Find a user by their id.
     *
     * @param  mixed $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find a user by their unique login.
     *
     * @param  mixed $login
     * @return mixed
     */
    public function findByLogin($login);

    /**
     * Log the user in.
     *
     * @param array   $input
     * @param boolean $remember
     * @return mixed
     */
    public function login(array $input, $remember);

    /**
     * Log a user out.
     *
     * @return bool
     */
    public function logout();

    /**
     * Register a new user.
     *
     * @param array $input
     * @return mixed
     */
    public function register(array $input);

    /**
     * Find a user by their id then update their details.
     *
     * @param mixed $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input);

} 