<?php

/* OrehaUserBundle:GestionUsers:gerer.html.twig */
class __TwigTemplate_4b3fce38b0775994ab9867fdcb9d1cd32dc39a2c84bb3e6a4fc468c09c1d373f extends Twig_Template
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
        echo " - Comptes utilisateurs";
    }

    // line 4
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"row-fluid\">
    <div class=\"span12\">
        <fieldset>
            <legend>
                Comptes utilisateurs
                <a class=\"btn btn-primary btn-small\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_users_add"), "html", null, true);
        echo "\"><i class=\"icon-plus\" ></i> Ajouter</a>
            </legend>
            <table class=\"table table-hover table-striped table-condensed\">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Dernière connexion</th>
                        <th>Status</th>
                    </tr>
                </thead>
            ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 21
            echo "                <tr id=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
            echo "\" class=\"islink usertable ";
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"))) {
                echo "error";
            }
            echo "\">
                    <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName"), "html", null, true);
            echo "</td>
                    <td>";
            // line 23
            if ((!twig_test_empty($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastlogin")))) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastlogin"), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo " ";
            } else {
                echo "Jamais";
            }
            echo "</td>
                    <td>
                        ";
            // line 25
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"))) {
                // line 26
                echo "                            <span class=\"label label-important\">Verrouillé</span>
                        ";
            } else {
                // line 28
                echo "                            <span class=\"label label-success\">Actif</span>
                        ";
            }
            // line 30
            echo "                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "            </table>
        </fieldset>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaUserBundle:GestionUsers:gerer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 33,  99 => 30,  95 => 28,  91 => 26,  89 => 25,  79 => 23,  75 => 22,  66 => 21,  62 => 20,  49 => 10,  42 => 5,  39 => 4,  32 => 3,);
    }
}
