<?php

/* ::orehaTemplate.html.twig */
class __TwigTemplate_94ef2ea218a097f72fafd44152027907c2ecfa0a83d519eb9b3afb106245b13a extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        <!--[if lt IE 9]>
            <script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.png"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"";
        // line 17
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
        // line 29
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 31
        echo "    </head>
    <body>
        ";
        // line 33
        $this->displayBlock('navbar', $context, $blocks);
        // line 82
        echo "    ";
        $this->displayBlock('body', $context, $blocks);
        // line 83
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 94
        echo "    </body>
</html>
  ";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "OrehaERP";
    }

    // line 29
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 30
        echo "        ";
    }

    // line 33
    public function block_navbar($context, array $blocks = array())
    {
        // line 34
        echo "        <div class=\"row\">
        <nav class=\"navbar\">
            <div class=\"navbar-inner\">
            <div class=\"container\">
                <ul class=\"nav\">
                    <li class=\"divider-vertical\"></li>
                    <li><a class=\"brand\" href=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_homepage"), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.jpg"), "html", null, true);
        echo "\"></a></li>
                    <li><a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_homepage"), "html", null, true);
        echo "\"><i class=\"icon-home\"></i>Accueil</a></li>
                    ";
        // line 42
        if ($this->env->getExtension('security')->isGranted("ROLE_MANAGER")) {
            // line 43
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_stat"), "html", null, true);
            echo "\"><i class=\"icon-eye-open\"></i>Tableau de bord</a></li>
                    ";
        }
        // line 45
        echo "                    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier"), "html", null, true);
        echo "\"><i class=\"icon-folder-open\"></i>Prospects</a></li>
                    
                    <li><a href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_client"), "html", null, true);
        echo "\"><i class=\"icon-briefcase\"></i>Clients</a></li>
                    ";
        // line 48
        if ($this->env->getExtension('security')->isGranted("ROLE_CHANTIER")) {
            // line 49
            echo "                        <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_chantier"), "html", null, true);
            echo "\"><i class=\"icon-wrench\"></i>Chantiers</a></li>
                    ";
        }
        // line 51
        echo "                    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_sav"), "html", null, true);
        echo "\"><i class=\"icon-leaf\"></i>S.A.V.</a></li>

                </ul>
                <ul class=\"nav pull-right\">
                    <li class=\"dropdown\">
                        <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\"><i class=\"icon-user\"></i> Bonjour ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
        echo " <strong class=\"caret\"></strong></a>
                        <ul class=\"dropdown-menu\">
                            <li><a href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_user_edit"), "html", null, true);
        echo "\"><i class=\"icon-cog\"></i> Profil</a></li> ";
        // line 59
        echo "                            ";
        if ($this->env->getExtension('security')->isGranted("ROLE_SUPER_ADMIN")) {
            // line 60
            echo "                                <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_admin"), "html", null, true);
            echo "\"><i class=\"icon-briefcase\"></i> Administration</a></li>
                            ";
        }
        // line 62
        echo "                            <li class=\"divider\"></li>
                            <li><a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_calendrier_user"), "html", null, true);
        echo "\"><i class=\"icon-calendar\"></i> Calendrier</a></li> ";
        // line 64
        echo "                            <li class=\"divider\"></li>
                            <li><a href=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
        echo "\"><i class=\"icon-off\"></i> Deconnexion</a></li>
                        </ul>
                    </li>
";
        // line 75
        echo "                </ul>

            </div>
            </div>
        </nav>
        </div>
    ";
    }

    // line 82
    public function block_body($context, array $blocks = array())
    {
    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        // line 84
        echo "    ";
        $this->env->loadTemplate("::js.html.twig")->display($context);
        // line 85
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
        return "::orehaTemplate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 85,  207 => 84,  204 => 83,  199 => 82,  189 => 75,  183 => 65,  180 => 64,  177 => 63,  174 => 62,  168 => 60,  165 => 59,  162 => 58,  157 => 56,  148 => 51,  142 => 49,  140 => 48,  136 => 47,  130 => 45,  124 => 43,  122 => 42,  118 => 41,  112 => 40,  104 => 34,  101 => 33,  97 => 30,  94 => 29,  88 => 13,  82 => 94,  79 => 83,  76 => 82,  74 => 33,  70 => 31,  68 => 29,  53 => 17,  49 => 16,  45 => 15,  41 => 14,  37 => 13,  27 => 5,);
    }
}
