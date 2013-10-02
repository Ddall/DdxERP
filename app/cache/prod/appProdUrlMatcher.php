<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // oreha_services_homepage
        if (0 === strpos($pathinfo, '/services/hello') && preg_match('#^/services/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_services_homepage')), array (  '_controller' => 'Oreha\\ServicesBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/groups')) {
                // fos_user_group_list
                if ($pathinfo === '/admin/groups/list') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_list;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
                }
                not_fos_user_group_list:

                // fos_user_group_new
                if ($pathinfo === '/admin/groups/new') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
                }

                // fos_user_group_show
                if (preg_match('#^/admin/groups/(?P<groupName>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_show')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::showAction',));
                }
                not_fos_user_group_show:

                // fos_user_group_edit
                if (preg_match('#^/admin/groups/(?P<groupName>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_edit')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::editAction',));
                }

                // fos_user_group_delete
                if (preg_match('#^/admin/groups/(?P<groupName>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_group_delete')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\GroupController::deleteAction',));
                }
                not_fos_user_group_delete:

            }

            if (0 === strpos($pathinfo, '/admin/users')) {
                // oreha_erp_user_edit
                if ($pathinfo === '/admin/users/selfedit') {
                    return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\UserController::selfEditAction',  '_route' => 'oreha_erp_user_edit',);
                }

                // oreha_erp_admin_users_index
                if (rtrim($pathinfo, '/') === '/admin/users') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'oreha_erp_admin_users_index');
                    }

                    return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::gererUsersAction',  '_route' => 'oreha_erp_admin_users_index',);
                }

                // oreha_erp_admin_user
                if (0 === strpos($pathinfo, '/admin/users/voir') && preg_match('#^/admin/users/voir/(?P<username>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_user')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::voirUserAction',));
                }

                // oreha_erp_admin_user_mini_edit
                if ($pathinfo === '/admin/users/mini') {
                    return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::miniUserAction',  '_route' => 'oreha_erp_admin_user_mini_edit',);
                }

                // oreha_erp_admin_users_add
                if ($pathinfo === '/admin/users/ajouter') {
                    return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::ajouterUserAction',  '_route' => 'oreha_erp_admin_users_add',);
                }

                // oreha_erp_admin_user_edit
                if (0 === strpos($pathinfo, '/admin/users/editer') && preg_match('#^/admin/users/editer/(?P<username>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_user_edit')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::editerUserAction',));
                }

                if (0 === strpos($pathinfo, '/admin/users/change')) {
                    // oreha_erp_admin_user_toggleenable
                    if (0 === strpos($pathinfo, '/admin/users/changestatut') && preg_match('#^/admin/users/changestatut/(?P<username>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_user_toggleenable')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::enableUserAction',));
                    }

                    // oreha_erp_admin_user_changer_mdp
                    if (0 === strpos($pathinfo, '/admin/users/changermdp') && preg_match('#^/admin/users/changermdp/(?P<username>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_user_changer_mdp')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GestionUsersController::changerMdpAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/users/groupe')) {
                    // oreha_erp_admin_group
                    if ($pathinfo === '/admin/users/groupe') {
                        return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::indexAction',  '_route' => 'oreha_erp_admin_group',);
                    }

                    // oreha_erp_admin_group_voir
                    if (preg_match('#^/admin/users/groupe/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_group_voir')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::voirAction',));
                    }

                    // oreha_erp_admin_group_ajouter
                    if ($pathinfo === '/admin/users/groupe/ajouter') {
                        return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::ajouterAction',  '_route' => 'oreha_erp_admin_group_ajouter',);
                    }

                    // oreha_erp_admin_group_editer
                    if (preg_match('#^/admin/users/groupe/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_group_editer')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::modifierAction',));
                    }

                    // oreha_erp_admin_group_supprimer
                    if (preg_match('#^/admin/users/groupe/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_admin_group_supprimer')), array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::supprimerAction',));
                    }

                    // oreha_erp_admin_group_ajouter_role
                    if ($pathinfo === '/admin/users/groupe/roles/ajouter') {
                        return array (  '_controller' => 'Oreha\\UserBundle\\Controller\\GroupeController::addRolesAction',  '_route' => 'oreha_erp_admin_group_ajouter_role',);
                    }

                }

            }

        }

        // oreha_erp_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'oreha_erp_homepage');
            }

            return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\indexController::indexAction',  '_route' => 'oreha_erp_homepage',);
        }

        if (0 === strpos($pathinfo, '/dossier')) {
            if (0 === strpos($pathinfo, '/dossiers')) {
                // oreha_erp_dossier
                if ($pathinfo === '/dossiers') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::indexAction',  '_route' => 'oreha_erp_dossier',);
                }

                // oreha_erp_dossier_kill
                if ($pathinfo === '/dossierskill') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::killAction',  '_route' => 'oreha_erp_dossier_kill',);
                }

            }

            if (0 === strpos($pathinfo, '/dossier/ajout')) {
                // oreha_erp_dossier_ajouter
                if ($pathinfo === '/dossier/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterAction',  '_route' => 'oreha_erp_dossier_ajouter',);
                }

                // oreha_erp_dossier_ajouter_vide
                if ($pathinfo === '/dossier/ajout/rapide') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajoutRapideAction',  '_route' => 'oreha_erp_dossier_ajouter_vide',);
                }

            }

            // oreha_erp_dossier_ajouter_contact
            if (preg_match('#^/dossier/(?P<id>\\d+)/contact/ajouter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_ajouter_contact')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterContactAction',));
            }

        }

        // oreha_erp_calendrier_user
        if ($pathinfo === '/calendrier') {
            return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\indexController::calendrierAction',  '_route' => 'oreha_erp_calendrier_user',);
        }

        if (0 === strpos($pathinfo, '/dossier')) {
            // oreha_erp_dossier_gagne
            if (preg_match('#^/dossier/(?P<id>\\d+)/gagne$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_gagne')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::gagneAction',));
            }

            // oreha_erp_dossier_perdu
            if (preg_match('#^/dossier/(?P<id>\\d+)/perdu$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_perdu')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::perduAction',));
            }

            // oreha_erp_dossier_sanssuite
            if (preg_match('#^/dossier/(?P<id>\\d+)/sanssuite$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_sanssuite')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::sanssuiteAction',));
            }

            // oreha_erp_dossier_voir
            if (preg_match('#^/dossier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirAction',));
            }

            // oreha_erp_dossier_modifier
            if (preg_match('#^/dossier/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierAction',));
            }

            // oreha_erp_dossier_bien_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/bien/ajouter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_bien_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterBienAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/bien')) {
                // oreha_erp_dossier_bien_voir
                if (preg_match('#^/dossier/bien/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_bien_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirBienAction',));
                }

                // oreha_erp_dossier_bien_modifier
                if (preg_match('#^/dossier/bien/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_bien_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierBienAction',));
                }

            }

            // oreha_erp_dossier_statut_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/statut/ajouter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_statut_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterStatutAction',));
            }

            // oreha_erp_dossier_statut_valider
            if (preg_match('#^/dossier/(?P<id>\\d+)/statut/valider$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_statut_valider')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::validerTransfertAction',));
            }

            // oreha_erp_dossier_statut_refuser
            if (preg_match('#^/dossier/(?P<id>\\d+)/statut/refuser$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_statut_refuser')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::refuserTransfertAction',));
            }

            // oreha_erp_dossier_rdv_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/rendezvous/ajouter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_rdv_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterRendezvousAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/rendezvous')) {
                // oreha_erp_dossier_rdv_voir
                if (preg_match('#^/dossier/rendezvous/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_rdv_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirRendezVousAction',));
                }

                // oreha_erp_dossier_rdv_modifier
                if (preg_match('#^/dossier/rendezvous/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_rdv_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierRendezVousAction',));
                }

                // oreha_erp_dossier_rdv_supprimer
                if (preg_match('#^/dossier/rendezvous/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_rdv_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerRendezVousAction',));
                }

            }

            // oreha_erp_dossier_commentaire_modifier
            if (preg_match('#^/dossier/(?P<idDossier>\\d+)/commentaire/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_commentaire_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::editCommentaireAction',));
            }

            // oreha_erp_dossier_commentaire_supprimer
            if (preg_match('#^/dossier/(?P<idDossier>\\d+)/commentaire/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_commentaire_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::deleteCommentaireAction',));
            }

            // oreha_erp_dossier_echeance_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/echeance/ajouter$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_echeance_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterEcheanceAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/echeance')) {
                // oreha_erp_dossier_echeance_modifier
                if (0 === strpos($pathinfo, '/dossier/echeance/modifier') && preg_match('#^/dossier/echeance/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_echeance_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierEcheanceAction',));
                }

                // oreha_erp_dossier_echeance_voir
                if (preg_match('#^/dossier/echeance/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_echeance_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirEcheanceAction',));
                }

                // oreha_erp_dossier_echeance_supprimer
                if (0 === strpos($pathinfo, '/dossier/echeance/supprimer') && preg_match('#^/dossier/echeance/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_echeance_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerEcheanceAction',));
                }

            }

            // oreha_erp_dossier_transfert_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/transferer$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_transfert_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::transfertDossierAction',));
            }

            // oreha_erp_dossier_transfert_valider_client
            if (preg_match('#^/dossier/(?P<id>\\d+)/validerclient$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_transfert_valider_client')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::validerClientAction',));
            }

            // oreha_erp_dossier_transfert_refuser_client
            if (preg_match('#^/dossier/(?P<id>\\d+)/refuserClient$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_transfert_refuser_client')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::refuserClientAction',));
            }

        }

        if (0 === strpos($pathinfo, '/client')) {
            // oreha_erp_client
            if ($pathinfo === '/client') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ClientController::indexAction',  '_route' => 'oreha_erp_client',);
            }

            // oreha_erp_client_voir
            if (preg_match('#^/client/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_client_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ClientController::voirAction',));
            }

        }

        // oreha_erp_test
        if ($pathinfo === '/test') {
            return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\RootController::testAction',  '_route' => 'oreha_erp_test',);
        }

        if (0 === strpos($pathinfo, '/contact')) {
            // oreha_erp_contact
            if ($pathinfo === '/contacts') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::indexAction',  '_route' => 'oreha_erp_contact',);
            }

            // oreha_erp_contact_ajouter
            if ($pathinfo === '/contact/new') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::newAction',  '_route' => 'oreha_erp_contact_ajouter',);
            }

            // oreha_erp_contact_voir
            if (preg_match('#^/contact/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::voirAction',));
            }

            // oreha_erp_contact_modifier
            if (preg_match('#^/contact/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::modifierAction',));
            }

            // oreha_erp_contact_ajoute_email
            if (preg_match('#^/contact/(?P<id>\\d+)/ajoutemail$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_ajoute_email')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::ajouterEmailAction',));
            }

            // oreha_erp_contact_ajoute_telephone
            if (preg_match('#^/contact/(?P<id>\\d+)/ajoutetelephone$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_ajoute_telephone')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::ajouterTelephoneAction',));
            }

            // oreha_erp_contact_supprime_telephone
            if (preg_match('#^/contact/(?P<idContact>\\d+)/deletetel/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_supprime_telephone')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::supprimeTelephoneAction',));
            }

            // oreha_erp_contact_supprime_email
            if (preg_match('#^/contact/(?P<idContact>\\d+)/deletemail/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_supprime_email')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::supprimeEmailAction',));
            }

            // oreha_erp_contact_supprimer
            if (preg_match('#^/contact/(?P<id>\\d+)/supprime$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_contact_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ContactController::supprimeContactAction',));
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // oreha_erp_admin
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\adminController::indexAction',  '_route' => 'oreha_erp_admin',);
            }

            if (0 === strpos($pathinfo, '/admin/source')) {
                // oreha_erp_source
                if ($pathinfo === '/admin/source') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SourceController::listeAction',  '_route' => 'oreha_erp_source',);
                }

                // oreha_erp_source_ajouter
                if ($pathinfo === '/admin/source/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SourceController::ajouterSourceAction',  '_route' => 'oreha_erp_source_ajouter',);
                }

                // oreha_erp_source_voir
                if (preg_match('#^/admin/source/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_source_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SourceController::voirSourceAction',));
                }

                // oreha_erp_source_modifier
                if (preg_match('#^/admin/source/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_source_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SourceController::modifierSourceAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/courrier')) {
                // oreha_erp_bundle_courrier
                if ($pathinfo === '/admin/courrier') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\CourrierController::listAction',  '_route' => 'oreha_erp_bundle_courrier',);
                }

                // oreha_erp_bundle_courrier_ajouter
                if ($pathinfo === '/admin/courrier/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\CourrierController::ajouterAction',  '_route' => 'oreha_erp_bundle_courrier_ajouter',);
                }

                // oreha_erp_bundle_courrier_modifier
                if (preg_match('#^/admin/courrier/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_bundle_courrier_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\CourrierController::modifierAction',));
                }

                // oreha_erp_bundle_courrier_voir
                if (preg_match('#^/admin/courrier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_bundle_courrier_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\CourrierController::voirAction',));
                }

                // oreha_erp_bundle_courrier_supprimer
                if (preg_match('#^/admin/courrier/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_bundle_courrier_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\CourrierController::supprimerAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/dossier')) {
            // oreha_erp_dossier_pret_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterpret$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_pret_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterPretAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/pret')) {
                // oreha_erp_dossier_pret_voir
                if (0 === strpos($pathinfo, '/dossier/pret/voir') && preg_match('#^/dossier/pret/voir/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_pret_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirPretAction',));
                }

                // oreha_erp_dossier_pret_modifier
                if (0 === strpos($pathinfo, '/dossier/pret/modifier') && preg_match('#^/dossier/pret/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_pret_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierPretAction',));
                }

                // oreha_erp_dossier_pret_supprimer
                if (0 === strpos($pathinfo, '/dossier/pret/supprimer') && preg_match('#^/dossier/pret/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_pret_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerPretAction',));
                }

            }

            // oreha_erp_dossier_facture_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterfacture$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_facture_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterFactureAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/facture')) {
                // oreha_erp_dossier_facture_voir
                if (0 === strpos($pathinfo, '/dossier/facture/voir') && preg_match('#^/dossier/facture/voir/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_facture_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirFactureAction',));
                }

                // oreha_erp_dossier_facture_modifier
                if (0 === strpos($pathinfo, '/dossier/facture/modifier') && preg_match('#^/dossier/facture/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_facture_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierFactureAction',));
                }

                // oreha_erp_dossier_facture_supprimer
                if (0 === strpos($pathinfo, '/dossier/facture/supprimer') && preg_match('#^/dossier/facture/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_facture_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerFactureAction',));
                }

            }

            // oreha_erp_dossier_payement_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterpayement$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_payement_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterPayementAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/payement')) {
                // oreha_erp_dossier_payement_voir
                if (0 === strpos($pathinfo, '/dossier/payement/voir') && preg_match('#^/dossier/payement/voir/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_payement_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirPayementAction',));
                }

                // oreha_erp_dossier_payement_modifier
                if (0 === strpos($pathinfo, '/dossier/payement/modifier') && preg_match('#^/dossier/payement/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_payement_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierPayementAction',));
                }

                // oreha_erp_dossier_payement_supprimer
                if (0 === strpos($pathinfo, '/dossier/payement/supprimer') && preg_match('#^/dossier/payement/supprimer/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_payement_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerPayementAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin/famille')) {
            if (0 === strpos($pathinfo, '/admin/famillecee')) {
                // oreha_admin_famille_cee
                if ($pathinfo === '/admin/famillecee') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamilleCEEController::listeAction',  '_route' => 'oreha_admin_famille_cee',);
                }

                // oreha_admin_famille_cee_ajouter
                if ($pathinfo === '/admin/famillecee/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamilleCEEController::ajouterFamilleAction',  '_route' => 'oreha_admin_famille_cee_ajouter',);
                }

                // oreha_admin_famille_cee_voir
                if (preg_match('#^/admin/famillecee/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_cee_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamilleCEEController::voirFamilleAction',));
                }

                // oreha_admin_famille_cee_modifier
                if (0 === strpos($pathinfo, '/admin/famillecee/modifier') && preg_match('#^/admin/famillecee/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_cee_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamilleCEEController::modifierFamilleAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/familleprestation')) {
                // oreha_admin_famille_prestation
                if ($pathinfo === '/admin/familleprestations') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::listeFamillesPrestationAction',  '_route' => 'oreha_admin_famille_prestation',);
                }

                // oreha_admin_famille_prestation_ajouter
                if ($pathinfo === '/admin/familleprestation/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::ajouterFamillePrestationAction',  '_route' => 'oreha_admin_famille_prestation_ajouter',);
                }

                // oreha_admin_famille_prestation_voir
                if (preg_match('#^/admin/familleprestation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_prestation_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::voirFamillePrestationAction',));
                }

                // oreha_admin_famille_prestation_modifier
                if (0 === strpos($pathinfo, '/admin/familleprestation/modifier') && preg_match('#^/admin/familleprestation/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_prestation_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::modifierFamillePrestationAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/familledeclaration')) {
                // oreha_admin_famille_declaration
                if ($pathinfo === '/admin/familledeclarations') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::listeFamillesDeclarationAction',  '_route' => 'oreha_admin_famille_declaration',);
                }

                // oreha_admin_famille_declaration_ajouter
                if ($pathinfo === '/admin/familledeclaration/ajouter') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::ajouterFamilleDeclarationAction',  '_route' => 'oreha_admin_famille_declaration_ajouter',);
                }

                // oreha_admin_famille_declaration_voir
                if (preg_match('#^/admin/familledeclaration/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_declaration_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::voirFamilleDeclarationAction',));
                }

                // oreha_admin_famille_declaration_modifier
                if (0 === strpos($pathinfo, '/admin/familledeclaration/modifier') && preg_match('#^/admin/familledeclaration/modifier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_admin_famille_declaration_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\FamillesController::modifierFamilleDeclarationAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/dossier')) {
            // oreha_erp_dossier_devis_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterdevis$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterDevisAction',));
            }

            // oreha_erp_dossier_devis_modifier
            if (0 === strpos($pathinfo, '/dossier/modifierdevis') && preg_match('#^/dossier/modifierdevis/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierDevisAction',));
            }

            // oreha_erp_dossier_devis_voir
            if (0 === strpos($pathinfo, '/dossier/voirdevis') && preg_match('#^/dossier/voirdevis/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirDevisAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/devis')) {
                // oreha_erp_dossier_devis_supprimer
                if (0 === strpos($pathinfo, '/dossier/devis/cee') && preg_match('#^/dossier/devis/cee/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerCEEAction',));
                }

                // oreha_erp_dossier_devis_cee_ajouter
                if (preg_match('#^/dossier/devis/(?P<id>\\d+)/ajoutercee$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_cee_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterCEEAction',));
                }

                // oreha_erp_dossier_devis_cee_modifier
                if (preg_match('#^/dossier/devis/(?P<id>\\d+)/modifiercee$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_cee_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierCEEAction',));
                }

                // oreha_erp_dossier_devis_cee_voir
                if (0 === strpos($pathinfo, '/dossier/devis/cee') && preg_match('#^/dossier/devis/cee/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_devis_cee_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirCEEAction',));
                }

            }

            // oreha_erp_dossier_prestation_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterprestation$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_prestation_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterPrestationAction',));
            }

            if (0 === strpos($pathinfo, '/dossier/prestation')) {
                // oreha_erp_dossier_prestation_modifier
                if (preg_match('#^/dossier/prestation/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_prestation_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierPrestationAction',));
                }

                // oreha_erp_dossier_prestation_voir
                if (preg_match('#^/dossier/prestation/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_prestation_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirPrestationAction',));
                }

                // oreha_erp_dossier_prestation_supprimer
                if (preg_match('#^/dossier/prestation/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_prestation_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerPrestationAction',));
                }

            }

            // oreha_erp_dossier_declaration_ajouter
            if (preg_match('#^/dossier/(?P<id>\\d+)/ajouterdeclaration$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_declaration_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::ajouterDeclarationAction',));
            }

            // oreha_erp_dossier_declaration_modifier
            if (0 === strpos($pathinfo, '/dossier/modifierdeclaration') && preg_match('#^/dossier/modifierdeclaration/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_declaration_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::modifierDeclarationAction',));
            }

            // oreha_erp_dossier_declaration_voir
            if (0 === strpos($pathinfo, '/dossier/voirdeclaration') && preg_match('#^/dossier/voirdeclaration/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_declaration_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::voirDeclarationAction',));
            }

            // oreha_erp_dossier_declaration_supprimer
            if (0 === strpos($pathinfo, '/dossier/supprimerdeclaration') && preg_match('#^/dossier/supprimerdeclaration/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_dossier_declaration_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\DossierController::supprimerDeclarationAction',));
            }

        }

        // oreha_erp_stat
        if ($pathinfo === '/statistiques') {
            return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\StatsController::managerIndexAction',  '_route' => 'oreha_erp_stat',);
        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/chantier')) {
                // oreha_erp_chantier
                if ($pathinfo === '/chantier') {
                    return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ChantierController::indexAction',  '_route' => 'oreha_erp_chantier',);
                }

                // oreha_erp_chantier_voir
                if (preg_match('#^/chantier/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_chantier_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ChantierController::voirAction',));
                }

            }

            // oreha_erp_chantier_ajouter
            if (0 === strpos($pathinfo, '/client') && preg_match('#^/client/(?P<id>\\d+)/ajouterChantier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_chantier_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ClientController::createChantierAction',));
            }

            if (0 === strpos($pathinfo, '/chantier')) {
                // oreha_erp_chantier_ajouter_commentaire
                if (preg_match('#^/chantier/(?P<id>\\d+)/ajouterCommentaire$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_chantier_ajouter_commentaire')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ChantierController::ajouterCommentaireAction',));
                }

                // oreha_erp_chantier_modifier_commentaire
                if (preg_match('#^/chantier/(?P<idChantier>\\d+)/modifierCommentaire/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_chantier_modifier_commentaire')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ChantierController::modifierCommentaireAction',));
                }

                // oreha_erp_chantier_supprimer_commentaire
                if (preg_match('#^/chantier/(?P<idChantier>\\d+)/supprimerCommentaire/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_chantier_supprimer_commentaire')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\ChantierController::supprimerCommentaireAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/sav')) {
            // oreha_erp_sav
            if ($pathinfo === '/sav') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::indexAction',  '_route' => 'oreha_erp_sav',);
            }

            // oreha_erp_sav_ouvrir
            if ($pathinfo === '/sav/ouvrirTicketAnon') {
                return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::ouvrirTicketAnonAction',  '_route' => 'oreha_erp_sav_ouvrir',);
            }

            // oreha_erp_sav_voir
            if (preg_match('#^/sav/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_voir')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::voirAction',));
            }

            // oreha_erp_sav_modifier
            if (preg_match('#^/sav/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::modifierTicketAction',));
            }

        }

        // oreha_erp_sav_ajouter
        if (0 === strpos($pathinfo, '/client') && preg_match('#^/client/(?P<id>\\d+)/ouvertureTicket$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::ouvertureTicketAction',));
        }

        if (0 === strpos($pathinfo, '/sav')) {
            // oreha_erp_sav_commentaire_ajouter
            if (preg_match('#^/sav/(?P<id>\\d+)/ajouterCommentaire$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_commentaire_ajouter')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::ajouterCommentaireAction',));
            }

            // oreha_erp_sav_commentaire_modifier
            if (preg_match('#^/sav/(?P<idTicket>\\d+)/commentaire/(?P<id>\\d+)/modifier$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_commentaire_modifier')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::modifierCommentaireAction',));
            }

            // oreha_erp_sav_commentaire_supprimer
            if (preg_match('#^/sav/(?P<idTicket>\\d+)/commentaire/(?P<id>\\d+)/supprimer$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'oreha_erp_sav_commentaire_supprimer')), array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\SavController::supprimerCommentaireAction',));
            }

        }

        // oreha_admin_reload_dossiers
        if ($pathinfo === '/admin/reloadDossiers') {
            return array (  '_controller' => 'Oreha\\ErpBundle\\Controller\\AdminController::reloadDossiersAction',  '_route' => 'oreha_admin_reload_dossiers',);
        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        // fullcalendar_loader
        if ($pathinfo === '/fc-load-events') {
            return array (  '_controller' => 'ADesigns\\CalendarBundle\\Controller\\CalendarController::loadCalendarAction',  '_route' => 'fullcalendar_loader',);
        }

        // endroid_qrcode
        if (0 === strpos($pathinfo, '/qrcode') && preg_match('#^/qrcode/(?P<text>[\\w\\W]+)\\.(?P<extension>jpg|png|gif)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'endroid_qrcode')), array (  '_controller' => 'Endroid\\Bundle\\QrCodeBundle\\Controller\\QrCodeController::generateAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
