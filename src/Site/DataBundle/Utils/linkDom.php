<?php
/**
 * Created by PhpStorm.
 * User: Goran
 * Date: 11/19/2015
 * Time: 02:36 PM
 */

namespace Site\DataBundle\Utils;

use Symfony\Component\DomCrawler\Crawler;

class linkDom {

    public function extractAction($url)
    {
        //$html = htmlspecialchars_decode($url);
        //print_r($html);

        $crawler = new Crawler();
        $crawler->add($url);

        /*$crawler = $crawler->filter('body')->nextAll();
        foreach ($crawler as $domElement) {
            $nodeValue = $domElement->nodeValue;
        }*/

        /*
         *
         *
        filterXpath('//html/body/div/div/form/div/div/table/tbody/tr/td/a/img')
        *
        *
        */
        $readData = $crawler
            ->filterXpath('//html/body/div/div/form/div/div')
            //->extract(array('_text', 'class'))
        ;

        /*
        $readData0 = $crawler
            ->filterXpath('//html/body/div/div/form/div/div')
            ->extract(array('_text', 'class'))
        ;
        print_r($readData0);
        */

        $html = '';
        foreach ($readData as $domElement) {
            $html .= $domElement->ownerDocument->saveHTML($domElement);
        }

        $crawler = new Crawler();
        $crawler->add($html);

        // /html/body/div/table
        $readData1 = $crawler
            ->filterXpath('//html/body/div/table/tr/th')
            //->extract(array('_text', 'class'))
        ;

        $readData11 = $crawler
            ->filterXpath('//html/body/div/table/tr/th')
            ->extract(array('_text', 'class'))
        ;

        /**** getting ID: to first array $showData1 *****/
        $showData1 = array();
        $j1 = 0;
        foreach($readData11 as $keyrow => $valuerow){
            if(($keyrow % 2) == 0) {
                foreach ($valuerow as $keyid => $valueid) {
                    if (($keyid % 2) == 0) {
                            $showData1[$j1] = $valueid;
                    }
                }
                $j1++;
            }
        }

        /******** Reading data from table - tr-td - $crawler->add($html);********/
        // /html/body/div/table
        $readData3 = $crawler
            ->filterXpath('//html/body/div/table/tr/td')
            //->extract(array('_text', 'class'))
        ;

        $readData33 = $crawler
            ->filterXpath('//html/body/div/table/tr/td')
            ->extract(array('_text', 'class'))
        ;

        /**** getting Description: to third array $showData3 *****/
        $showData3 = array();
        $j3 = 0;
        foreach($readData33 as $keyrow => $valuerow){
            if(($keyrow % 2) == 0) {
                foreach ($valuerow as $keydesc => $valuedesc) {
                    if (($keydesc % 2) == 0) {
                        $showData3[$j3] = $valuedesc;
                    }
                }
                $j3++;
            }
        }

        /*
        $html3 = '';
        foreach ($readData3 as $domElement) {
            $html3 .= $domElement->ownerDocument->saveHTML($domElement);
        }
        */

        /******** Reading data URL from table - tr-td - $crawler->add($html);********/
        // /html/body/div/table
        $readData4 = $crawler
            ->filterXpath('//html/body/div/table/tr/td/a/img')
            //->extract(array('_text', 'class'))
        ;

        $readData44 = $crawler
            ->filterXpath('//html/body/div/table/tr/td/a/img')
            ->extract(array('src', 'img'))
        ;

        /**** getting URL: to fourth array $showData4 *****/
        $showData4 = array();
        $j4 = 0;
        foreach($readData44 as $keyrow => $valuerow){
                foreach ($valuerow as $keyurl => $valueurl) {
                    if (($keyurl % 2) == 0) {
                        $showData4[$j4] = $valueurl;
                    }
                }
                $j4++;
        }

        $html4 = '';
        foreach ($readData4 as $domElement) {
            $html4 .= $domElement->ownerDocument->saveHTML($domElement);
        }


        /******** Reading data from table - tr-th - input - $crawler->add($html1);********/
        // /html/body/div/table
        $html1 = '';
        foreach ($readData1 as $domElement) {
            $html1 .= $domElement->ownerDocument->saveHTML($domElement);
        }

        $crawler = new Crawler();
        $crawler->add($html1);

        $readData2 = $crawler
            ->filterXpath('//html/body/th/input')
            //->extract(array('_text', 'class'))
        ;

        $readData22 = $crawler
            ->filterXpath('//html/body/th/input')
            ->extract(array('value', 'input'))
        ;

/*        $reducedSubsetCrawler = $crawler->reduce(function (Crawler $crawler, $i) {
                // Just return `false` if you want to remove an element from a set:
                return preg_match('/^value/', $crawler->attr('input'));
            });

        $newCrawler = $crawler->filter('input[type=text]')
            ->first();
*/
        /**** getting Title: to second array $showData2 *****/
        $showData2 = array();
        $j2 = 0;
        foreach($readData22 as $keyrow => $valuerow){
                foreach ($valuerow as $keyid => $valueid) {
                    if (($keyid % 2) == 0) {
                        $showData2[$j2] = $valueid;
                    }
                }
                $j2++;
        }

        $html2 = '';
        foreach ($readData2 as $domElement) {
            $html2 .= $domElement->ownerDocument->saveHTML($domElement);
        }

        $crawler = new Crawler();
        $crawler->add($html2);

        //$more = $reducedSubsetCrawler->filter('a > img')->first();

        /*********** Create array of array to return to controller **************/
        $showData = array($showData1, $showData2, $showData3, $showData4);

        $i = count($showData[0]);
        //print_r($i);

        $showDataD1 = $showData[0];
        $showDataD2 = $showData[1];
        $showDataD3 = $showData[2];
        $showDataD4 = $showData[3];

        $showDataA = array();


            for ($j = 0; $j < $i; $j++) {
                $showDataA[$j][0] = $showDataD1[$j];
            }
            for ($j = 0; $j < $i; $j++) {
                $showDataA[$j][1] = $showDataD2[$j];
            }
            for ($j = 0; $j < $i; $j++) {
                $showDataA[$j][2] = $showDataD3[$j];
            }
            for ($j = 0; $j < $i; $j++) {
                $showDataA[$j][3] = $showDataD4[$j];
            }


        //print_r($showDataD1);
        //print_r($showData);
        //print_r($showDataA);
        return $showDataA;

        //$crawler = $crawler->filter('body')->children()->text();
        //return $crawler;
    }
} 