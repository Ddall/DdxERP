<?php

/* OrehaErpBundle:Bien:new.html.twig */
class __TwigTemplate_ff163e9b437e72efca569e4e18745a60c84ecc58fd8525e75e32271a3a6e0032 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaTemplate.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "::orehaTemplate.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Ajouter un bien";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div  class=\"span10\">
            <fieldset>
                <legend>
                    Dossier ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule"), "html", null, true);
        echo " - Ajouter un bien
                    <a class=\"btn\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-arrow-left\"></span> Retour</a>
                </legend>
                <div class=\"well\">
                    <form method=\"post\" ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formBien"]) ? $context["formBien"] : $this->getContext($context, "formBien")), 'enctype');
        echo ">
                        ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formBien"]) ? $context["formBien"] : $this->getContext($context, "formBien")), 'widget');
        echo "
                        <input type=\"submit\" class=\"btn btn-primary\" />
                        <a class=\"btn\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\">Annuler</a>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Bien:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 17,  63 => 15,  59 => 14,  53 => 11,  49 => 10,  42 => 5,  39 => 4,  32 => 3,);
    }
}
