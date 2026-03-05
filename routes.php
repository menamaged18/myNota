<?php

$routes = [
    '/'                         => 'NoteController@index',
    '/about'                    => 'AboutController@index',
    '/note/create'              => 'NoteController@create',
    '/note/store'               => 'NoteController@store',
    '/note/edit/{id}'           => 'NoteController@edit',
    '/note/update/{id}'         => 'NoteController@update',
    '/note/delete/{id}'         => 'NoteController@destroy',

    '/note/details/store'       => 'NoteDetailsController@store',
    '/note/details/delete/{id}' => 'NoteDetailsController@destroy',
    '/note/details/edit/{id}'   => 'NoteDetailsController@edit',
    '/note/details/update'      => 'NoteDetailsController@update',

    // dynamic routes are the end
    '/note/{id}'                => 'NoteDetailsController@index',
];