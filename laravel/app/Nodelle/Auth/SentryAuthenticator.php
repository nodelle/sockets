<?php namespace Nodelle\Auth;

use Sentry;

class SentryAuthenticator implements AuthInterface {

    /**
     * Check if a user is signed in.
     *
     * @return bool
     */
    public function check()
    {
        return Sentry::check();
    }

    /**
     * Find a user by their id.
     *
     * @param  mixed $id
     * @return mixed
     */
    public function find($id)
    {
        return Sentry::findUserById($id);
    }

    /**
     * Find a user by their unique login.
     *
     * @param  mixed $login
     * @return mixed
     */
    public function findByLogin($login)
    {
        return Sentry::findUserByLogin($login);
    }

    /**
     * Get the current user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return Sentry::getUser();
    }

    /**
     * Log a user in.
     *
     * @param array $input
     * @param bool $remember
     * @return mixed
     */
    public function login(array $input, $remember)
    {
        return Sentry::authenticate($input, $remember);
    }

    /**
     * Log a user out.
     *
     * @return bool
     */
    public function logout()
    {
        return Sentry::logout();
    }

    /**
     * Register a new user.
     *
     * @param array $input
     * @return mixed
     */
    public function register(array $input)
    {
        return Sentry::register($input, true);
    }

    /**
     * Find a user by their id then update their details.
     *
     * @param mixed $id
     * @param array $input
     * @return mixed
     */
    public function update($id, array $input)
    {
        return $this->find($id)->update($input);
    }
}