<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/19/2015
 * Time: 10:32 AM
 */

namespace Site\DataBundle\Controller;


use Site\DataBundle\Entity\Select;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TestController extends Controller{

    public function testAction(Request $request)
    {
        //create a test data
        $select = new Select();

        /*$select->setTitle('Probni naslov');
        $select->setLink('http://www.olala.co.rs/orders');
        $select->setHtml('<html><head><title>Naslov olala stranice</title></head><body>Telo olala stranice<h1>Naslove</h1><p>Jedan paragraf..<p>Paragraf drugi...</p></body></html>');
        $select->setDueDate(new \DateTime('today'));
        */

        $form = $this->createFormBuilder($select)
            ->add('title')
            ->add('html', 'textarea')
            ->add('link', 'textarea')
            ->add('due_date', 'datetime')
            ->add('save', 'submit', array('label' => 'Check Selected Code'))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()){
            // treba ubaciti cuvanje podataka u bazu
/*            $em = $this->getDoctrine()->getManager();
            $em->persist($select);
            $em->flush();
*/

            //return $this->redirectToRoute('test_succes');
            $postData = $request->request->get('form');
            var_dump($postData);

            return $this->render('SiteDataBundle:Test:test.html.twig', array(
                    'html' => $postData['html'],
                ));
        }



        return $this->render('SiteDataBundle:Default:index.html.twig', array(
                'form' => $form->createView(),
            ));

    }
} 