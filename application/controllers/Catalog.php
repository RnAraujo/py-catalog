<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Entities\Goods;

require_once APPPATH . 'models/Entities/Goods.php';

class Catalog extends CI_Controller {

	public function index($page = 1)
	{
        $this->load->library('Twig');
        $this->load->library('Doctrine');
        $this->load->library('pagination');

        $config['base_url'] = 'http://example.com/index.php/test/page/';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        //echo $this->pagination->create_links();

        $em = $this->doctrine->em;

        $dql = "SELECT g FROM Entities\Goods g";
        $per_page = 18;
        $offset = $page * $per_page;
        $query = $em->createQuery($dql)
            ->setFirstResult($offset)
            ->setMaxResults($per_page);
        $goods = $query->getResult();

        echo $this->twig->render('goods.index', array(
            'goods' => $goods
        ));
	}

    public function index2()
    {
        // $this->load->view('welcome_message');
        $this->load->library('Twig');
        $this->load->library('Doctrine');

        $em = $this->doctrine->em;

        $goods = $em->getRepository(Goods::class)->findAll();

        echo $this->twig->render('rd.hello', array(
            'name' => 'Rene Araujo23',
            'goods' => $goods
        ));
    }
}
