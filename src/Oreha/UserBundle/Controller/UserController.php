<?php
/**
 * Description of UserController
 *
 * @author allan.irdel
 */

namespace Oreha\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use FOS\UserBundle\Model\UserManagerInterface;

//use Oreha\UserBundle\Entity\User;
use Oreha\UserBundle\Form\UserPublicType as UserType;

class UserController extends Controller{

    /**
     * Les utilisateurs peuvent modifier leurs infos
     * @return view
     */
    public function selfEditAction(){
        $user = $this->getUser();
        $formUser = $this->createForm(new UserType(), $user);
        
        $request= $this->getRequest();
        if(strtoupper($request->getMethod() == 'POST')){
            $formUser->bind($request);
            
            if($formUser->isValid()){

                $this->getUserManager()->updateUser($user);
                return $this->redirect( $this->generateUrl('oreha_erp_homepage'));
            }
        }
        
        return $this->render('OrehaUserBundle:Public:selfedit.html.twig', array(
            'formUser' => $formUser->createView(),
            'user' => $user
        ));
    }
    
      
    
    // TOOLS
    /**
     * 
     * @return UserManager
     */
    private function getUserManager(){
        return $this->container->get('fos_user.user_manager');
    }
    
    
}
