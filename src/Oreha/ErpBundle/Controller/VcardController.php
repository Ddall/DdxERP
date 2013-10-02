<?php
/*
 *  OrehaERP - allan.irdel
 *  RootController.php - UTF-8
 */

namespace Oreha\ErpBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VcardController extends Controller{
    
    
private function encode($string) {
	return escape(quoted_printable_encode($string));
}

private function escape($string) {
	return str_replace(";","\;",$string);
}

// taken from PHP documentation comments
private function quoted_printable_encode($input, $line_max = 76) {
	$hex = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
	$lines = preg_split("/(?:\r\n|\r|\n)/", $input);
	$eol = "\r\n";
	$linebreak = "=0D=0A";
	$escape = "=";
	$output = "";

	for ($j=0;$j<count($lines);$j++) {
		$line = $lines[$j];
		$linlen = strlen($line);
		$newline = "";
		for($i = 0; $i < $linlen; $i++) {
			$c = substr($line, $i, 1);
			$dec = ord($c);
			if ( ($dec == 32) && ($i == ($linlen - 1)) ) { // convert space at eol only
				$c = "=20"; 
			} elseif ( ($dec == 61) || ($dec < 32 ) || ($dec > 126) ) { // always encode "\t", which is *not* required
				$h2 = floor($dec/16); $h1 = floor($dec%16); 
				$c = $escape.$hex["$h2"].$hex["$h1"]; 
			}
			if ( (strlen($newline) + strlen($c)) >= $line_max ) { // CRLF is not counted
				$output .= $newline.$escape.$eol; // soft line break; " =\r\n" is okay
				$newline = "    ";
			}
			$newline .= $c;
		} // end of for
		$output .= $newline;
		if ($j<count($lines)-1) $output .= $linebreak;
	}
	return trim($output);
}


    
    
    
    
    /**
     * 
     * @param integer $id idcontact
     */
    public function makeContactVcardAction($id){
        $contact = $this->getContact($id);

        return $this->render('OrehaErpBundle:Vcard:card.vcard.twig', array('contact' => $contact));
    }
    
    
    /**
     * 
     * @param integer $id
     */
    public function makeContactQrCardAction($id){
        $contact = $this->getContact($id);
    }
    
    
    /**
     * 
     * @param integer $id
     * @return \Oreha\ErpBundle\Controller\Contact
     * @throws type
     */
    private function getContact($id){
        $em = $this->getDoctrine()->getManager()->getRepository('OrehaErpBundle:Contact');
        $contact = $em->find($id);
        
        if(!is_object($contact) || !($contact instanceof \Oreha\ErpBundle\Entity\Contact)){
            throw $this->createNotFoundException('id contact invalide');
        } 
        return $contact;
    }
    
}