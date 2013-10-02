<?php

/* OrehaErpBundle:Admin:index.html.twig */
class __TwigTemplate_d6dfcb367cb84554b9badd8d84b287d8b597fab27ab7a1faa5bc6b51adad5694 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaAdminTemplate.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::orehaAdminTemplate.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Administration";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span10\">
            <h2>Administration</h2>
            
            
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Admin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  39 => 7,  32 => 6,);
    }
}
