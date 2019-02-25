<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Twig
{
    private $_twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(APPPATH . 'views');
        $this->_twig = new Twig_Environment($loader, array(
            'cache'        => APPPATH . 'cache',
            'auto_reload'  => true,
            'debug'        => true,
            'charset'      => 'utf-8'
        ));

        $this->_twig->addFunction(new Twig_SimpleFunction('base_url', 'base_url'));
        $this->_twig->addFunction(new Twig_SimpleFunction('site_url', 'site_url'));
    }

    public function render($template, $data = array())
    {
        $address_template = str_replace('.', '/', $template);

        return $this->_twig->render($address_template . '.twig', $data);
    }
}
