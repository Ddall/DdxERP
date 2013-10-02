<?php

/* OrehaErpBundle:Dossier:transferer.html.twig */
class __TwigTemplate_91bdab377b04269f04575056df7fe7262597bc0be40fbffb9c061298524c3894 extends Twig_Template
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
        echo " - Transferer le dossier";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid \">
        <div class=\"span10\">
            <div class=\"well\">
                <legend>
                    Transferer le dossier ";
        // line 10
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule")), "html", null, true);
        echo "
                    <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-small\"><span class=\"icon-arrow-left\"></span> Retour</a>
                </legend>
                    ";
        // line 18
        echo "                <form method=\"post\" class=\" form form-horizontal\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formTransfert"]) ? $context["formTransfert"] : $this->getContext($context, "formTransfert")), 'enctype');
        echo ">
                    <div class=\"row-fluid\">
                        ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["formTransfert"]) ? $context["formTransfert"] : $this->getContext($context, "formTransfert")));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 21
            echo "                            ";
            if (($this->getAttribute($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "vars"), "name") != "_token")) {
                // line 22
                echo "                            <div class=\"control-group\">
                                <div class=\"control-label\">
                                    ";
                // line 24
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'label');
                echo "
                                    ";
                // line 25
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'errors');
                echo "
                                </div>
                                <div class=\"controls\">
                                    ";
                // line 28
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                </div>
                            </div>
                            ";
            } else {
                // line 32
                echo "                                ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                            ";
            }
            // line 34
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                    </div>

                    <div class=\"row-fluid\">
                        <div class=\"alert alert-info offset1 span7\">
                            <div class=\"echeanceForm\">
                                <legend>Nouvelle échéance:</legend>
                                ";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["formEcheance"]) ? $context["formEcheance"] : $this->getContext($context, "formEcheance")));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 42
            echo "                                    ";
            if (($this->getAttribute($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "vars"), "name") != "_token")) {
                // line 43
                echo "                                        <div class=\"control-group\">
                                            <div class=\"control-label\">
                                                ";
                // line 45
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'label');
                echo " 
                                                ";
                // line 46
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'errors');
                echo "
                                            </div>
                                            <div class=\"controls\">
                                                ";
                // line 49
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                            </div>
                                        </div>
                                    ";
            } else {
                // line 53
                echo "                                        ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                    ";
            }
            // line 55
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "                                
                            </div>
                        </div>
                    </div>

                    <div class=\"row-fluid\">
                        <div class=\"offset1\">
                            <input type=\"submit\" class=\"btn btn-primary\" />
                            <a class=\"btn\" href=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Dossier:transferer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 64,  152 => 56,  146 => 55,  140 => 53,  133 => 49,  127 => 46,  123 => 45,  119 => 43,  116 => 42,  112 => 41,  104 => 35,  98 => 34,  92 => 32,  85 => 28,  79 => 25,  75 => 24,  71 => 22,  68 => 21,  64 => 20,  58 => 18,  53 => 11,  49 => 10,  42 => 5,  39 => 4,  32 => 3,);
    }
}
