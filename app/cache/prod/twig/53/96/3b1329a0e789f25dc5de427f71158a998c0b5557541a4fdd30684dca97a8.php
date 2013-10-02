<?php

/* OrehaUserBundle:Groupe:voir.html.twig */
class __TwigTemplate_53963b1329a0e789f25dc5de427f71158a998c0b5557541a4fdd30684dca97a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Groupe ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "name"), "html", null, true);
    }

    // line 4
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <legend>
            Groupe ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "name"), "html", null, true);
        echo "
            <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_group"), "html", null, true);
        echo "\" class=\"btn btn-small\"><span class=\"icon-arrow-left\"></span> Retour</a>
            <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_group_editer", array("id" => $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-small btn-primary\"><span class=\"icon-edit\"></span> Modifier</a>

        </legend>
        <div class=\"row-fluid\">
            <div class=\"span8\">
                <strong>Nom du groupe: </strong> ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "name"), "html", null, true);
        echo " <br/>
                <blockquote>
                    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "roles"));
        foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
            // line 18
            echo "                        ";
            echo twig_escape_filter($this->env, (isset($context["role"]) ? $context["role"] : $this->getContext($context, "role")), "html", null, true);
            echo "<br>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                </blockquote>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaUserBundle:Groupe:voir.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 20,  73 => 18,  69 => 17,  64 => 15,  56 => 10,  52 => 9,  48 => 8,  43 => 5,  40 => 4,  32 => 3,);
    }
}
