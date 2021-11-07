<?php

// таблица маршрутов
return array (

    'news/([0-9]+)' => 'news/view/$1', // news/view/123
	'news' => 'news/index', // actionIndex in NewsController


//	'products' => 'product/list', // actionList in ProductController
);