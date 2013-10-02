<?php
/**
 * Description of OrehaExtension
 *
 * @author allan.irdel
 */

namespace Oreha\ErpBundle\Twig;

class OrehaExtension extends \Twig_Extension {
    public function getFilters(){
        return array(
            'mydate' => new \Twig_Filter_Method($this, 'mydateFilter')
        );
    }
    
    public function getName(){
        return 'oreha_extension';
    }

    public function mydateFilter(){
        
    }
    
}