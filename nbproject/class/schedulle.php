<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of schedulle
 *
 * @author mc
 */
class schedulle {
    
    private  $calendarArray = array();
    private $teamsArray = array();
    
    
    
    
    public function __construct(){
        $this->setTeams();
        $this->getCallendar();
    }
    
    private function setTeams(){       

        $html = new simple_html_dom();
        $html->load_file('http://rotoguru2.com/hoop/schedule.html');


        foreach ( $html->find('table[cellspacing="1"] tbody tr') as $test){
            foreach($test->find('th') as $singleTh){

                if(!($singleTh->plaintext === 'Date')){
                   $this->teamsArray[] = $singleTh->plaintext;
                }

            }
            break;   
        }
     }

    private function getCallendar(){

        $html = new simple_html_dom();
        $html->load_file('http://rotoguru2.com/hoop/schedule.html');

       foreach ( $html->find('table[cellspacing="1"] tbody tr') as $test){

          if($test->find('td',0)){
          $this->calendarArray[] = $test->find('td',0)->plaintext;
          }
       }



    } 
    
    public function getTeams(){
        return $this->teamsArray;
    }
    
    
}
