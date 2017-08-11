<?php

event('faq.routing', app('router'));
$namespacePrefix = '\\'.'Tyondo\\Faq\\Http\\Controllers'.'\\';
//-----Back-end ----------//

Route::resource('faq', $namespacePrefix.'FaqController', [
    'names'=> [
        'index' => 'tyondo.faq.index',
        'create' => 'tyondo.faq.create',
        'store' => 'tyondo.faq.store',
        'update' => 'tyondo.faq.update',
        'destroy' => 'tyondo.faq.destroy',
        'show' => 'tyondo.faq.show',
        'edit' => 'tyondo.faq.edit',
    ]
]);