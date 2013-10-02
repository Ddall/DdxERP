<?php

namespace EnhancedProxya3db2306_eed3d8aa85c7d574eafce4c75d5987cbd58ae3e8\__CG__\Oreha\ErpBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class StatsController extends \Oreha\ErpBundle\Controller\StatsController
{
    private $__CGInterception__loader;

    public function managerIndexAction()
    {
        $ref = new \ReflectionMethod('Oreha\\ErpBundle\\Controller\\StatsController', 'managerIndexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}