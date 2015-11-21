<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/19/2015
 * Time: 02:36 PM
 */

namespace Site\DataBundle\Utils;

use Symfony\Component\DomCrawler\Crawler;

class shakeDom {

    public function extractAction($html)
    {

        $crawler = new Crawler();

        $crawler->add($html);

        /*$crawler = $crawler->filter('body')->nextAll();
        foreach ($crawler as $domElement) {
            $nodeValue = $domElement->nodeValue;
        }*/

        $readData = $crawler
            ->filterXpath('//body/p')
            ->extract(array('_text', 'class'))
        ;

        //print_r($readData);
        $i = 0;
        $j = 0;
        $showData = array();
        foreach($readData as $row){
            foreach($row as $key=>$value) {
                if ($key == 0) {
                    if(($j % 2) == 0){
                        $showDataEven[$i] = $value;
                    }else{
                        $showDataOdd[$i] = $value;
                        $i++;
                    }
                }
            }
            $j++;
        }

        $i = 0;
        $j = 0;
        foreach($showDataEven as $keyeven=>$valueeven){
            $showData[$i][$j] = $valueeven;
            $j++;
            foreach($showDataOdd as $keyodd=>$valueodd){
                if($keyeven == $keyodd){
                    $showData[$i][$j] = $valueodd;
                    $j = 0;
                }
            }
            $i++;
        }

        //print_r($showData);
        return $showData;

        //$crawler = $crawler->filter('body')->children()->text();
        //return $crawler;
    }

} 