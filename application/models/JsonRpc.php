<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JsonRpc
 *
 * @author steven
 */
class Application_Model_JsonRpc {
    /**
     * Summe von zwei Variablen zurückgeben
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function add($x, $y)
    {
        return $x + $y;
    }
 
    /**
     * Differenz von zwei Variablen zurückgeben
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function subtract($x, $y)
    {
        return $x - $y;
    }
 
    /**
     * Produkt von zwei Variablen zurückgeben
     *
     * @param  int $x
     * @param  int $y
     * @return int
     */
    public function multiply($x, $y)
    {
        return $x * $y;
    }
 
    /**
     * Division von zwei Variablen zurückgeben
     *
     * @param  int $x
     * @param  int $y
     * @return float
     */
    public function divide($x, $y)
    {
        return $x / $y;
    }
    
    public function getIpAddress()
    {
        $ip = $_SERVER['REMOTE_ADDR'];  
        $host = gethostbyaddr($ip);
        
        return ($ip." ".$host);
    }
}
