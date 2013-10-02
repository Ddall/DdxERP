<?php

/* OrehaUserBundle:User:voir.html.twig */
class __TwigTemplate_53a3a7c59674f57bfafce68946eac803333f4a634e0efc7db3edd786c87af55f extends Twig_Template
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
        echo " - Profil de ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "html", null, true);
    }

    // line 4
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <legend>
            Utilisateur ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName"), "html", null, true);
        echo "
            <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_users_index"), "html", null, true);
        echo "\" class=\"btn btn-small\"><span class=\"icon-arrow-left\"></span> Retour</a>
            <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user_changer_mdp", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
        echo "\"class=\"btn btn-primary btn-small\"><span class=\"icon-retweet\"></span>Modifier mot de passe</a>
            <a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user_edit", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
        echo "\" class=\"btn btn-primary btn-small\"><span class=\"icon-edit\"></span> Modifier le compte</a>
            ";
        // line 12
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"))) {
            // line 13
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user_toggleenable", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
            echo "\" class=\"btn btn-success btn-small\"><span class=\"icon-lock\"></span> Déverrouiller le compte</a>
            ";
        } else {
            // line 15
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_user_toggleenable", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"))), "html", null, true);
            echo "\" class=\"btn btn-danger btn-small\"><span class=\"icon-lock\"></span> Verrouiller le compte</a>
            ";
        }
        // line 17
        echo "        </legend>
        <div class=\"row-fluid\">
            <div class=\"span8\">
                <strong>Login: </strong> ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username"), "html", null, true);
        echo " <br/>
                <strong>Statut:</strong> ";
        // line 21
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "enabled"))) {
            echo "<span class=\"label label-important\">Verrouillé</span>
                        ";
        } else {
            // line 22
            echo "<span class=\"label label-success\">Actif</span>";
        }
        echo "<br/>
                <strong>Email: </strong> ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email"), "html", null, true);
        echo " <br/>
                <strong>Dernière connexion: </strong> ";
        // line 24
        if ((!twig_test_empty($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastlogin")))) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "lastlogin"), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
            echo " ";
        } else {
            echo "Jamais";
        }
        echo "<br/>
                <strong>Membre de :</strong>
                <blockquote>
                    ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "groups"));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 28
            echo "                        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "name"), "html", null, true);
            echo "<br>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                </blockquote>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "OrehaUserBundle:User:voir.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 30,  116 => 28,  112 => 27,  101 => 24,  97 => 23,  92 => 22,  87 => 21,  83 => 20,  78 => 17,  72 => 15,  66 => 13,  64 => 12,  60 => 11,  56 => 10,  52 => 9,  48 => 8,  43 => 5,  40 => 4,  32 => 3,);
    }
}
