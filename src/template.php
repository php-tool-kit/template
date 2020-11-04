<?php

namespace ptk\template;

/**
 * Carrega o loader do Twig.
 * 
 * @staticvar \Twig\Environment $twig
 * @param string $path
 * @param array $loader_options
 * @param bool $reset Se TRUE, força o carregamento do loader.
 * @return \Twig\Environment
 */
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

/**
 * Renderiza o template.
 * 
 * @param string $view
 * @param array $context
 * @return string
 */
function render(string $view, array $context = []): string {
    $twig = load('');
    
    return $twig->render($view, $context);
}