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

Route::get('workspace', [
    'as' => 'workspace.index',
    'uses' => 'WorkspaceController@index',
]);

Route::get('workspace/{id}', [
    'as' => 'workspace.show',
    'uses' => 'WorkspaceController@show',
]);

Route::get('nodes/{id}/create', [
    'as' => 'nodes.create',
    'uses' => 'NodeController@create',
]);