<?php

namespace ptk\template;

function load(string $path, array $loader_options = [], bool $reset = false): \Twig\Environment {
    static $twig = null;
    if($reset === false){
        if(!is_null($twig)){
            return $twig;
        }
    }
    
    if(!file_exists($path)){
        trigger_error("Caminho de templates $path não existe", E_USER_ERROR);
    }
    
    try{
        $loader = new \Twig\Loader\FilesystemLoader($path);
        $twig = new \Twig\Environment($loader, $loader_options);
    } catch (\Exception $ex) {
        trigger_error($ex->getTrace(), E_USER_ERROR);
    }
    
    return $twig;
}

function render(string $view, array $context = []){
    $twig = load('');
    
    return $twig->render($view, $context);
}