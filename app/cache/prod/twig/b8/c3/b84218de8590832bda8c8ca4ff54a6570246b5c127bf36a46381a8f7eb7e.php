<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_b8c3b84218de8590832bda8c8ca4ff54a6570246b5c127bf36a46381a8f7eb7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["logs"]) ? $context["logs"] : $this->getContext($context, "logs")));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["log"]) ? $context["log"] : $this->getContext($context, "log")), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 4,  29 => 3,  90 => 20,  58 => 13,  34 => 5,  28 => 4,  24 => 2,  97 => 22,  95 => 21,  92 => 20,  88 => 19,  82 => 18,  78 => 17,  75 => 16,  71 => 14,  67 => 12,  59 => 9,  53 => 8,  44 => 9,  27 => 3,  199 => 90,  190 => 84,  186 => 82,  176 => 74,  174 => 73,  171 => 72,  169 => 71,  166 => 70,  161 => 67,  159 => 66,  154 => 63,  145 => 59,  141 => 57,  139 => 56,  136 => 55,  126 => 47,  124 => 46,  120 => 44,  118 => 43,  115 => 42,  108 => 40,  104 => 24,  94 => 31,  89 => 28,  72 => 25,  69 => 15,  65 => 23,  54 => 12,  52 => 19,  42 => 6,  22 => 1,  101 => 40,  96 => 9,  91 => 6,  83 => 19,  81 => 40,  49 => 7,  47 => 10,  39 => 7,  35 => 12,  30 => 4,  25 => 2,  60 => 14,  57 => 21,  46 => 8,  43 => 8,  36 => 5,  33 => 3,);
    }
}
