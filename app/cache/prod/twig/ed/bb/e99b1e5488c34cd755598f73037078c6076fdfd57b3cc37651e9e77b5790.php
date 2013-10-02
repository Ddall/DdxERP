<?php

/* OrehaUserBundle:User:modifier.html.twig */
class __TwigTemplate_edbbe99b1e5488c34cd755598f73037078c6076fdfd57b3cc37651e9e77b5790 extends Twig_Template
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
        echo " Modifier un utilisateur";
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
                    Modifier les informations du compte ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName"), "html", null, true);
        echo "
                    <a class=\"btn\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
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
        return "OrehaUserBundle:User:modifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 33,  104 => 31,  98 => 30,  92 => 28,  85 => 24,  79 => 21,  75 => 20,  71 => 18,  68 => 17,  64 => 16,  59 => 14,  53 => 11,  49 => 10,  42 => 5,  39 => 4,  32 => 3,);
    }
}
