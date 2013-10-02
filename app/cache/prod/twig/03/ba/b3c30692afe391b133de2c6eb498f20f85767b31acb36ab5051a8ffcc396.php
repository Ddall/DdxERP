<?php

/* OrehaUserBundle:Groupe:list.html.twig */
class __TwigTemplate_03bab3c30692afe391b133de2c6eb498f20f85767b31acb36ab5051a8ffcc396 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaAdminTemplate.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
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
    <div class=\"row-fluid\">
        <div class=\"span10 well\">
            <legend>
                Groupes
                <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_group_ajouter"), "html", null, true);
        echo "\" class=\"btn btn-success\"><span class=\"icon-plus\"></span> Nouveau Groupe</a>
            </legend>
            <table class=\"table table-condensed table-hover table-striped\">
                <thead>
                    <th>Nom</th>
                    <th>Droits</th>
                </thead>
                <tbody>
                    ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groupes"]) ? $context["groupes"] : $this->getContext($context, "groupes")));
        foreach ($context['_seq'] as $context["_key"] => $context["groupe"]) {
            // line 32
            echo "                        <tr class=\"islink\" id=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_group_voir", array("id" => $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "id"))), "html", null, true);
            echo "\">
                            <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "name"), "html", null, true);
            echo "</td>
                            <td>
                                ";
            // line 35
            if ((!twig_test_empty($this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "roles")))) {
                // line 36
                echo "                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["groupe"]) ? $context["groupe"] : $this->getContext($context, "groupe")), "roles"));
                foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                    // line 37
                    echo "                                        ";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["role"]) ? $context["role"] : $this->getContext($context, "role"))), "html", null, true);
                    echo "
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['role'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "                                ";
            }
            // line 40
            echo "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['groupe'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "                </tbody>
            </table>
        </div>
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
        return "OrehaUserBundle:Groupe:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 16,  143 => 15,  134 => 43,  126 => 40,  123 => 39,  114 => 37,  109 => 36,  107 => 35,  102 => 33,  97 => 32,  93 => 31,  82 => 23,  74 => 17,  72 => 15,  69 => 14,  62 => 12,  53 => 10,  49 => 9,  44 => 8,  40 => 7,  35 => 4,  32 => 3,);
    }
}
