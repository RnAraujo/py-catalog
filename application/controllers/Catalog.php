<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Entities\Goods;

require_once APPPATH . 'models/Entities/Goods.php';

class Catalog extends CI_Controller {

	public function index($start = 0)
	{
        $this->load->library('Twig');
        $this->load->library('Doctrine');
        $this->load->library('pagination');

        $pagination_url = site_url('catalog/index/');

        $em = $this->doctrine->em;

        $query = $em->createQuery('SELECT COUNT(g.id) FROM Entities\Goods g');
        $total_results = $query->getSingleScalarResult();
        $total_pages = ceil($total_results / 10);

        $start_page = ($start / 10);

        if($start_page < 6)
        {
            $start_page = 0;
        }
        else
        {
            $start_page = $start_page - 5;
        }

        $dql = "SELECT g FROM Entities\Goods g";
        $per_page = 10;
        // $offset = ($page - 1) * $per_page;
        
        $query = $em->createQuery($dql)
            ->setFirstResult($start)
            ->setMaxResults($per_page);
        $goods = $query->getResult();

        echo $this->twig->render('goods.index', array(
            'goods' => $goods,
            'pagination_url' => $pagination_url,
            'current_page' => $start / 10,
            'pages' => 10,
            'start_page' => $start_page,
            'last_page' => $start_page + 9
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
