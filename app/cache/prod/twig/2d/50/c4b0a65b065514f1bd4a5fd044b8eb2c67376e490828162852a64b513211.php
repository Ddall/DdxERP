<?php

/* OrehaUserBundle:User:ajouter.html.twig */
class __TwigTemplate_2d50c4b0a65b065514f1bd4a5fd044b8eb2c67376e490828162852a64b513211 extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " Ajouter un utilisateur";
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
                    Ajouter un utilisateur
                    <a class=\"btn\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_users_index"), "html", null, true);
        echo "\"><span class=\"icon-arrow-left\"></span> Retour</a>
                </legend>
                <div class=\"well\">
                    <form method=\"post\" class=\"form form-horizontal\" ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formUser"]) ? $context["formUser"] : $this->getContext($context, "formUser")), 'enctype');
        echo ">
                        <div class=\"row-fluid\">
                            ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["formUser"]) ? $context["formUser"] : $this->getContext($context, "formUser")));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 17
            echo "                                ";
            if (($this->getAttribute($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "vars"), "name") != "_token")) {
                // line 18
                echo "                                <div class=\"control-group\">
                                    <div class=\"control-label\">
                                        ";
                // line 20
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'label');
                echo "
                                        ";
                // line 21
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'errors');
                echo "
                                    </div>
                                    <div class=\"controls\">
                                        ";
                // line 24
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                    </div>
                                </div>
                                ";
            } else {
                // line 28
                echo "                                    ";
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), 'widget');
                echo "
                                ";
            }
            // line 30
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                        </div>
                        <input type=\"submit\" class=\"btn btn-primary\" />
                        <a class=\"btn\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_users_index"), "html", null, true);
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
        return "OrehaUserBundle:User:ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 33,  101 => 31,  95 => 30,  89 => 28,  82 => 24,  76 => 21,  72 => 20,  68 => 18,  65 => 17,  61 => 16,  56 => 14,  50 => 11,  42 => 5,  39 => 4,  32 => 3,);
    }
}
