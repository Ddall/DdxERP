<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_a40547c6c039ab68922e09a6fda7fce5de134e970e14deccaafb80963bdca8d8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMINlol")) ? ("::orehaAdminTemplate.html.twig") : ("::orehaAdminTemplate.html.twig")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span8\">
            ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "all", array(), "method"));
        foreach ($context['_seq'] as $context["key"] => $context["messages"]) {
            // line 8
            echo "                <div class=\"alert alert-";
            echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")), "html", null, true);
            echo "\">
                    ";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : $this->getContext($context, "messages")));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 10
                echo "                       ";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), array(), "FOSUserBundle"), "html", null, true);
                echo "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "
            ";
        // line 15
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 17
        echo "        </div>
    </div>

</div>
";
    }

    // line 15
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 16
        echo "            ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 16,  80 => 15,  72 => 17,  70 => 15,  67 => 14,  60 => 12,  51 => 10,  47 => 9,  38 => 7,  33 => 4,  30 => 3,  107 => 33,  99 => 30,  95 => 28,  91 => 26,  89 => 25,  79 => 23,  75 => 22,  66 => 21,  62 => 20,  49 => 10,  42 => 8,  39 => 4,  32 => 3,);
    }
}
