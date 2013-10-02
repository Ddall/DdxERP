<?php

/* OrehaErpBundle:Dossier:newsimple.html.twig */
class __TwigTemplate_e4845b045006ab1f90c40ede430439ad58fbf2ae3bfa1a1c96e009e80124c6b6 extends Twig_Template
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
        echo " - Nouveau dossier";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div  class=\"span12\">
            <fieldset>
                <legend>
                    Créer un dossier dossier
                    <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier"), "html", null, true);
        echo "\" class=\"btn\"><span class=\"icon-arrow-left\"></span> Retour</a>
                </legend>
                    <div class=\"well\">
                        <h2>Dossier</h2>
                        <form method=\"post\" class=\" form form-horizontal\" ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formDossier"]) ? $context["formDossier"] : $this->getContext($context, "formDossier")), 'enctype');
        echo ">
                            ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["formDossier"]) ? $context["formDossier"] : $this->getContext($context, "formDossier")));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 17
            echo "                                    ";
            if (($this->getAttribute($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "vars"), "name") != "_token")) {
                // line 18
                echo "                                    <div class=\"control-group\">
                                        <span class=\"control-label\">";
                // line 19
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'label');
                echo "</span>
                                        <div class=\"controls\">
                                            ";
                // line 21
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                        </div>
                                    </div>
                                    ";
            } else {
                // line 25
                echo "                                        ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                    ";
            }
            // line 27
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "                                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formDossier"]) ? $context["formDossier"] : $this->getContext($context, "formDossier")), 'rest');
        echo "
                        <input type=\"submit\" class=\"btn btn-primary\" />
                        <a class=\"btn\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier"), "html", null, true);
        echo "\">Annuler</a>
                    </form>
            </fieldset>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Dossier:newsimple.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 30,  95 => 28,  89 => 27,  83 => 25,  76 => 21,  71 => 19,  68 => 18,  65 => 17,  61 => 16,  57 => 15,  50 => 11,  42 => 5,  39 => 4,  32 => 3,);
    }
}
