<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/18/2015
 * Time: 09:16 PM
 */

namespace Site\DataBundle\Controller;

use Site\DataBundle\Form\LinkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Site\DataBundle\Entity\Select;
use Site\DataBundle\Form\SelectType;
use Symfony\Component\DomCrawler\Link;
use Symfony\Component\HttpFoundation\Request;

use Site\DataBundle\Utils\shakeDom;
use Site\DataBundle\Utils\linkDom;


class SelectController extends Controller {

    public function navigationAction(Request $request)
    {
        return $this->render('SiteDataBundle:Default:navigation.html.twig');
    }

    public function readAction(Request $request)
    {
        //build the form
        $select = new Select();
        $form = $this->createForm(new SelectType(), $select);

        //handling form submits
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $html = $select->getHtml();

            $shake = new shakeDom();
            $showData = $shake->extractAction($html);
            //print_r($showData);

            return $this->render('SiteDataBundle:Select:selected.html.twig', array(
                    'html' => $select->getHtml(),
                    'showData' => $showData,
                ));
        }

        //render the template
        return $this->render('SiteDataBundle:Default:index.html.twig', array(
                'form'   => $form->createView(),
            ));
    }

    public function linkAction(Request $request)
    {
        //build the form
        $select = new Select();
        $form = $this->createForm(new LinkType(), $select);

        //handling form submits
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            //$html = $select->getHtml();
            $link = $select->getLink();
            $url = file_get_contents($link);

            $shake = new linkDom();
            $showData = $shake->extractAction($url);


            return $this->render('SiteDataBundle:Select:linkselected.html.twig', array(
                    'html' => $url,
                    'showData' => $showData,
                ));
        }

        //render the template
        return $this->render('SiteDataBundle:Default:index.html.twig', array(
                'form'   => $form->createView(),
            ));
    }
} 