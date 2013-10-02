<?php

/* OrehaErpBundle:Admin:reloadDossiers.html.twig */
class __TwigTemplate_fd89a47565c111ccd6be5fd06cf9c7d66a085ef1e98554358f97d5b986fcffae extends Twig_Template
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
        echo " - Mise à jour des droits dossiers";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid well\">
        <div class=\"span10 \">
            <h2>Mise à jour des droits dossiers</h2>
            
            <div class=\"alert alert-success\">
                <span class=\"icon-thumbs-up\"></span>
                <strong>
                    ";
        // line 16
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["dossiers"]) ? $context["dossiers"] : $this->getContext($context, "dossiers"))), "html", null, true);
        echo " dossiers mis à jour.
                </strong>
            </div>
            
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Admin:reloadDossiers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 16,  42 => 8,  39 => 7,  32 => 6,);
    }
}
