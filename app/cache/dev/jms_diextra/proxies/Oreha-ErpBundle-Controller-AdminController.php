<?php

namespace EnhancedProxya3db2306_58059d927ca75e9c01053fc74815eae2087da3f4\__CG__\Oreha\ErpBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class AdminController extends \Oreha\ErpBundle\Controller\AdminController
{
    private $__CGInterception__loader;

    public function reloadDossiersAction()
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\AdminController', 'reloadDossiersAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\AdminController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}