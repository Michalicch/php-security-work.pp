<?php
use wfm\Router;
//Дефолтные правила
Router::add('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']); //общее правило

Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']); //конкретное правило

//Router::add('^(?P<lang>[a-z]+)?/?product/(?P<slug>[a-z0-9_-]+)/?$', ['controller' => 'Product', 'action' => 'view']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']); // общее правило //в регулярных выражениях ^ - означает начало строки, $ - конец строки.

Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$'); //конкретное правило
