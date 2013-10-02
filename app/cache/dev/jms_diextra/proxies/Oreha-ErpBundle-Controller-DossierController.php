<?php

namespace EnhancedProxya3db2306_e421925d3620e66c183862cd6d18e7114e00f92b\__CG__\Oreha\ErpBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class DossierController extends \Oreha\ErpBundle\Controller\DossierController
{
    private $__CGInterception__loader;

    public function validerClientAction($id)
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\DossierController', 'validerClientAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function refuserClientAction($id)
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\DossierController', 'refuserClientAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}