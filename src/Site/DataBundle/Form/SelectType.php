<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/18/2015
 * Time: 08:47 PM
 */

namespace Site\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SelectType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $link = $_SERVER['DOCUMENT_ROOT']."\sitedata\src\Site\DataBundle\Utils\urlexample.html";
        //print_r($link);
        @$url = file_get_contents($link);

        $builder
            //->add('title', 'text', array('required' => false))
            ->add('html', 'textarea', array(
                    'attr' => array(
                        'style' => 'width:300px; height:300px'),
                        'data' => $url,
                ))
            //->add('link', 'textarea')
            //->add('due_date', 'datetime')
            ->add('save', 'submit', array('label' => 'Check Selected Code'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Site\DataBundle\Entity\Select'
            ));
    }

    public function getName()
    {
        return 'site_getdata_select';
    }


} 