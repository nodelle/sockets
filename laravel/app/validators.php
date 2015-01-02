<?php

Validation::add('login', function($validator)
{
    $validator->rule('email')->required()->email();
    $validator->rule('password')->required();
});

Validation::add('register', function($validator)
{
    $validator->rule('first_name')->required();
    $validator->rule('last_name')->required();
    $validator->rule('email')->required()->email();
    $validator->rule('password')->required();
});