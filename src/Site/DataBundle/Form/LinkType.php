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


class LinkType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $url = "http://www.olala.co.rs/orders/";
        $builder
            //->add('title', 'text', array('required' => false))
            //->add('html', 'textarea', array('attr' => array('style' => 'width:300px; height:300px'),))
            ->add('link', 'textarea', array(
                    'attr' => array(
                    'style' => 'width:300px; height:30px'),
                    'data' => $url,
                    'read_only' => true,
                    'label' => 'Link of page ',
                ))
            //->add('due_date', 'datetime')
            ->add('save', 'submit', array('label' => 'Get data from page'))
        ;
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