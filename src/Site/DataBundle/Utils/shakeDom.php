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

        /*
         * print_r($readData); - Array ( [0] => Array ( [0] => Hello World! [1] => message ) [1] => Array ( [0] => Hello Crawler! [1] => ) [2] => Array
         *
         * Throw empty data from array readData and create arrays $showDataEven and $showDataOdd
         */

        /* Prvi nacin
        $i = 0;
        $j = 0;

        $showData = array();
        foreach($readData as $row){
            foreach($row as $key=>$value) {
                if ($key == 0) {
                    if(($j % 2) == 0){
                        $showDataEven[$i] = $value;
                        $showDataA[$a][$b] = $value;
                        $b++;
                    }else{
                        $showDataOdd[$i] = $value;
                        $i++;
                        $showDataA[$a][$b] = $value;
                        $a++;
                        $b = 0;
                    }
                }
            }
            $j++;
        }
        */

        /*
         * $showDataEven: Array ( [0] => Hello World! [1] => Hello World2! [2] => Hello World3! [3] => Hello World4! )
         * and $showDataOdd: Array ( [0] => Hello Crawler! [1] => Hello Crawler2! [2] => Hello Crawler3! [3] => Hello Crawler4! )
         */
        /*$i = 0;
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
        }*/

        $a = 0;
        $b = 0;
        /* Drugi nacin */
        $showDataA = array();
        foreach($readData as $row){
            foreach($row as $key=>$value) {
                if ($key == 0) {
                    if(($b % 2) == 0){
                        $showDataA[$a][$b] = $value;
                        $b++;
                    }else{
                        $showDataA[$a][$b] = $value;
                        $a++;
                        $b = 0;
                    }
                }
            }
        }


        //print_r($showDataA);
        return $showDataA;

        //$crawler = $crawler->filter('body')->children()->text();
        //return $crawler;
    }

} 