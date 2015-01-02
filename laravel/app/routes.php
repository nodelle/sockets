<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home.index',
    'uses' => 'HomeController@index',
]);

Route::get('/send-message', function()
{
    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://127.0.0.1:5555");

    $socket->send(json_encode(['message' => 'hello world', 'category' => 'kittensCategory', 'title' => 'Test']));
});

Route::get('login', [
    'as' => 'auth.login',
    'uses' => 'AuthController@login'
]);

Route::post('login', [
    'as' => 'auth.login',
    'uses' => 'AuthController@postLogin'
]);

Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'AuthController@logout'
]);

Route::get('register', [
    'as' => 'auth.register',
    'uses' => 'AuthController@register',
]);

Route::post('register', [
    'as' => 'auth.register',
    'uses' => 'AuthController@postRegister',
]);

Route::get('test', function()
{
    $user = User::find(2);

    dd($user);
});

Route::post('api/workspace/{id}/new-node', [
    'as' => 'api.workspace.newNode',
    'uses' => 'Api\WorkspaceController@newNode',
]);

Route::post('api/workspace/{id}/node/{nodeId}/update', [
    'as' => 'api.workspace.node.update',
    'uses' => 'Api\WorkspaceController@updateNode',
]);

Route::get('workspace/{id}', [
    'as' => 'workspace.show',
    'uses' => 'WorkspaceController@show',
]);

Route::get('nodes/{id}/create', [
    'as' => 'nodes.create',
    'uses' => 'NodeController@create',
]);