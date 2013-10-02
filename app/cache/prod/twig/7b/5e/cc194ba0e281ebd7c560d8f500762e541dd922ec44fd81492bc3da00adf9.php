<?php

/* ::orehaAdminTemplate.html.twig */
class __TwigTemplate_7b5ecc194ba0e281ebd7c560d8f500762e541dd922ec44fd81492bc3da00adf9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navbar' => array($this, 'block_navbar'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 6
            echo "<!DOCTYPE html>
<html>
    <head>
        <!--[if lt IE 9]>
            <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
            // line 14
            $this->displayBlock('title', $context, $blocks);
            echo "</title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.png"), "html", null, true);
            echo "\" />
        <link rel=\"stylesheet\" href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.min.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/datetimepicker.css"), "html", null, true);
            echo "\" type=\"text/css\" />
        <style>
            .navbar-search .search-query {
                padding-left: 29px;
            }

            .navbar-search .icon-search {
                position: absolute;
                top: 7px;
                left: 11px;
            }
        </style>
        ";
            // line 30
            $this->displayBlock('stylesheets', $context, $blocks);
            // line 32
            echo "    </head>
    <body>
        ";
            // line 34
            $this->displayBlock('navbar', $context, $blocks);
            // line 73
            echo "    ";
            $this->displayBlock('body', $context, $blocks);
            // line 74
            echo "    ";
            $this->displayBlock('javascripts', $context, $blocks);
            // line 85
            echo "    </body>
</html>
";
        }
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Administration";
    }

    // line 30
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 31
        echo "        ";
    }

    // line 34
    public function block_navbar($context, array $blocks = array())
    {
        // line 35
        echo "        <div class=\"row\">
            <nav class=\"navbar navbar-inverse\">
                <div class=\"navbar-inner\">
                    <a class=\"brand\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.small.png"), "html", null, true);
        echo "\"> Administration</a>
                    <ul class=\"nav\">
                        <li class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"icon-cog\"></i> Configuration <strong class=\"caret\"></strong></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_source"), "html", null, true);
        echo "\"><i class=\"icon-briefcase\"></i> Sources de prospects</a></li>
                                <li><a href=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_bundle_courrier"), "html", null, true);
        echo "\"><i class=\"icon-edit\"></i> Modèles de courriers</a></li>
                                <li><a href=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_admin_famille_cee"), "html", null, true);
        echo "\"><i class=\"icon-hand-up\"></i> Familles de CEE</a></li>
                                <li><a href=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_admin_famille_prestation"), "html", null, true);
        echo "\"><i class=\"icon-shopping-cart\"></i> Familles de prestations</a></li>
                                <li><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_admin_famille_declaration"), "html", null, true);
        echo "\"><i class=\"icon-file\"></i> Familles de déclarations</a></li>
                            </ul>
                        </li>
                    <li class=\"dropdown\">
                        <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"icon-cog\"></i>Outils<strong class=\"caret\"></strong></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_admin_reload_dossiers"), "html", null, true);
        echo "\"><i class=\"icon-globe\"></i>Recharger les permissions des dossiers</a></li>
                        </ul>
                    </li>
                        <li class=\"dropdown\">
                            <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"icon-user\"></i> Utilisateurs <strong class=\"caret\"></strong></a>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_users_index"), "html", null, true);
        echo "\"><i class=\"icon-user\"></i> Utilisateurs</a></li>
                                <li><a href=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin_group"), "html", null, true);
        echo "\"><i class=\"icon-globe\"></i> Groupes</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class=\"nav navbar-text pull-right\">
                        <li><a href=\"#\"><span class=\"icon-user\"></span> Bienvenue ";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "fullName"), "html", null, true);
        echo "</a></li>
                        <li><a href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_homepage"), "html", null, true);
        echo "\"><span class=\"icon-arrow-left\"></span> Retour</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    ";
    }

    // line 73
    public function block_body($context, array $blocks = array())
    {
    }

    // line 74
    public function block_javascripts($context, array $blocks = array())
    {
        // line 75
        echo "    ";
        $this->env->loadTemplate("::js.html.twig")->display($context);
        // line 76
        echo "            <script type=\"text/javascript\">
                \$(document).ready(function(){
                   \$('.islink').click(function(){
                        var url = \$(this).attr('id');
                        window.location.replace(url); 
                   });
                });
            </script>
    ";
    }

    public function getTemplateName()
    {
        return "::orehaAdminTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 76,  191 => 75,  188 => 74,  183 => 73,  173 => 67,  169 => 66,  160 => 60,  156 => 59,  147 => 53,  138 => 47,  134 => 46,  130 => 45,  126 => 44,  122 => 43,  112 => 38,  107 => 35,  104 => 34,  100 => 31,  97 => 30,  91 => 14,  84 => 85,  81 => 74,  78 => 73,  76 => 34,  72 => 32,  70 => 30,  55 => 18,  51 => 17,  47 => 16,  43 => 15,  39 => 14,  29 => 6,  27 => 5,);
    }
}
