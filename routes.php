<?php

$routes = [
    '/'                         => 'NoteController@index',
    '/about'                    => 'AboutController@index',
    '/note/create'              => 'NoteController@create',
    '/note/store'               => 'NoteController@store',
    '/note/edit/{id}'           => 'NoteController@edit',
    '/note/update/{id}'         => 'NoteController@update',
    '/note/delete/{id}'         => 'NoteController@destroy',
    // dynamic routes are the end
    '/note/{id}'                => 'NoteDetailsController@index',
];