<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_316776d62007bed5d18e1ef06369e1c4c612a7c5ead1e685007d8678e938bc9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaTemplate.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navbar' => array($this, 'block_navbar'),
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
        echo " - Connexion";
    }

    // line 4
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 5
        echo "    <style type=\"text/css\">
        body {
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #F0F0F0;
        }

        .form-signin {
          max-width: 300px;
          padding: 19px 29px 50px;
          margin: 0 auto 20px;
          background-color: #fff;
          border: 1px solid #e5e5e5;
          -webkit-border-radius: 5px;
             -moz-border-radius: 5px;
                  border-radius: 5px;
          -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
             -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                  box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
          margin-bottom: 10px;
        }
        .form-signin input[type=\"text\"],
        .form-signin input[type=\"password\"] {
          font-size: 16px;
          height: auto;
          margin-bottom: 15px;
          padding: 7px 9px;
        }
    </style>
";
    }

    // line 38
    public function block_navbar($context, array $blocks = array())
    {
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
        // line 40
        echo "<div class=\"container\">
    <div class=\"form-signin\">
        <a href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html", null, true);
        echo "\"><img class=\"pull-left\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/LogoOreha.png"), "html", null, true);
        echo "\" alt=\"Oreha\"></a>
        <h2 class=\"form-signin-heading\">Connexion</h2>
        ";
        // line 44
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 45
            echo "            <div class=\"alert alert-error\">
                ";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "<a class=\"close\" data-dismiss=\"alert\" href=\"#\">x</a>
            </div>
        ";
        }
        // line 49
        echo "        <form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

            <label for=\"username\">";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />

            <label for=\"password\">";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <input type=\"password\" id=\"password\" name=\"_password\" required=\"required\" />
            
            <label class=\"checkbox\" for=\"remember_me\">";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo " 
            <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" /></label>
            
            <input class=\"btn btn-info btn-large pull-right\" type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
        </form>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 61,  135 => 58,  129 => 55,  124 => 53,  120 => 52,  115 => 50,  110 => 49,  104 => 46,  101 => 45,  99 => 44,  92 => 42,  88 => 40,  85 => 39,  80 => 38,  44 => 5,  41 => 4,  34 => 3,);
    }
}
