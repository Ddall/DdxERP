<?php
/*
 *  OrehaERP - allan.irdel
 *  GestionUsersController.php - UTF-8
 */

namespace Oreha\UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use FOS\UserBundle\Model\UserManagerInterface;

//use Oreha\UserBundle\Entity\User;
use Oreha\UserBundle\Form\UserType;
use Oreha\UserBundle\Form\NewUserType;


//use Symfony\Component\HttpFoundation\Response;

class GestionUsersController extends Controller{
    public function gererUsersAction(){
//        Recupere la liste des utilisateurs
        $userManager = $this->container->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        
        return $this->render('OrehaUserBundle:GestionUsers:gerer.html.twig', 
                array('users' => $users));
    }
    
    
    public function ajouterUserAction(){
        $em = $this->getManager();
        $user = $em->createUser();
        $formUser = $this->createForm(new NewUserType(), $user);
        
        $request= $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formUser->bind($request);
            
            if($formUser->isValid()){
                
                $data = $formUser['password']->getData();
                $user->setPlainPassword( $data );
                
                $em->updateUser($user);
                
                return $this->redirect($this->generateUrl('oreha_erp_admin_user', array(
                    'username' => $user->getUsername()
                )));
            }
            
        }
       
        return $this->render('OrehaUserBundle:User:ajouter.html.twig', array(
           'formUser' =>$formUser->createView()
        ));
    }

    /**
     * 
     * @param string $username
     * @return view
     */
    public function editerUserAction($username){
        $user = $this->getMyUser($username);
        
        $formUser = $this->createForm( new UserType(), $user );
        
        
        $request = $this->getRequest();
        if(strtoupper($request->getMethod()) == 'POST'){
            $formUser->bind($request);
            
            if($formUser->isValid()){
                $em = $this->getManager();
                $em->updateUser($user);
            }
            
            return $this->redirect($this->generateUrl('oreha_erp_admin_user', array(
                'username' => $user->getUsername()
            )));
        }
        
        
        
        return $this->render('OrehaUserBundle:User:modifier.html.twig', array(
            'formUser' => $formUser->createView(),
            'user' => $user
        ));
        
    }
    
    /**
     * 
     * @param string $username
     * @return view
     * @throws notfoundexception
     */
    public function voirUserAction($username){
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserByUsername($username);
        
        // check si l'user existe
        if(!is_object($user)){
            throw $this->createNotFoundException('id user invalide');
        }
        
        return $this->render('OrehaUserBundle:User:voir.html.twig', array('user' => $user));
    }
    
    /**
     * Change le l'attribut enabled
     * @param strong $username
     * @return redirection
     */
    public function enableUserAction($username){
        $em = $this->getManager();
        $user = $em->findUserByUsername($username);
        
        $user->setEnabled( !$user->isEnabled() );
        $em->updateUser($user);

        return $this->redirect( $this->generateUrl('oreha_erp_admin_user', array(
            'username' => $user->getUsername()
        ) ));
    }
    
    /**
     * CHANGE LE MOT DE PASSE D'UN UTILISATEUR
     * @param string $username
     * @return view
     * @throws notfoundexception
     */
    public function changerMdpAction($username){
        $user = $this->getManager()->findUserByUserName($username);
        
        if(!is_object($user)){
            throw $this->createNotFoundException('username invalide');
        }
        
        $fb = $this->createFormBuilder();
        $fb->add('newpw', 'repeated', array(
            'type' => 'password',
            'required' => true,
            'label' => 'Changer de mot de passe',
            'first_options' => array('label' => 'Nouveau mot de passe' ),
            'second_options' => array('label' => 'Confirmation' )
        ));
        
        $formPw = $fb->getForm();
        $request = $this->getRequest();
        
        if(strtoupper($request->getMethod())== 'POST'){
            
            $formPw->bind($request);
            if($formPw->isValid()){
                $m = $this->getManager();
                
                $pw = $formPw->getData();
                
                $user->setPlainPassword($pw['newpw']);
                $m->updateUser($user);
                
                return $this->redirect( $this->generateUrl('oreha_erp_admin_user', array(
                    'username' => $user->getUsername()
                ) ));
            }
        }
        
        return $this->render('OrehaUserBundle:GestionUsers:resetmdp.html.twig', array(
            'formPw'=>$formPw->createView(),
            'user' => $user
        ));
    }
    
    
    // TOOLS
    private function getManager(){
        return $this->container->get('fos_user.user_manager');
    }
    
    private function getMyUser($username){
        $user = $this->getManager()->findUserByUsername($username);
        
        if(!is_object($user)){
            throw $this->createNotFoundException('username invalide');
        }
        
        return $user;
    }
}