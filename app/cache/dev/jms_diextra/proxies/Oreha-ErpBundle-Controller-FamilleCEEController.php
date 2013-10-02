<?php

namespace EnhancedProxya3db2306_44c135d520586041e5192d17523fd81914b93fb6\__CG__\Oreha\ErpBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class FamilleCEEController extends \Oreha\ErpBundle\Controller\FamilleCEEController
{
    private $__CGInterception__loader;

    public function voirFamilleAction($id)
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\FamilleCEEController', 'voirFamilleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function supprimerFamilleAction($id)
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\FamilleCEEController', 'supprimerFamilleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function modifierFamilleAction($id)
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\FamilleCEEController', 'modifierFamilleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function listeAction()
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\FamilleCEEController', 'listeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function ajouterFamilleAction()
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\FamilleCEEController', 'ajouterFamilleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}