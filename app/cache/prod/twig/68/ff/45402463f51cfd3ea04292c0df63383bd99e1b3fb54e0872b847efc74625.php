<?php

/* ::js.html.twig */
class __TwigTemplate_68ff45402463f51cfd3ea04292c0df63383bd99e1b3fb54e0872b847efc74625 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = array())
    {
        // line 3
        echo "    <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/html5shiv.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/locales/bootstrap-datetimepicker.fr.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        \$(document).ready(function(){

            \$.fn.datetimepicker.dates['fr'] = {
                days: [\"Dimanche\", \"Lundi\", \"Mardi\", \"Mercredi\", \"Jeudi\", \"Vendredi\", \"Samedi\", \"Dimanche\"],
                daysShort: [\"Dim\", \"Lun\", \"Mar\", \"Mer\", \"Jeu\", \"Ven\", \"Sam\", \"Dim\"],
                daysMin: [\"D\", \"L\", \"Ma\", \"Me\", \"J\", \"V\", \"S\", \"D\"],
                months: [\"Janvier\", \"Février\", \"Mars\", \"Avril\", \"Mai\", \"Juin\", \"Juillet\", \"Août\", \"Septembre\", \"Octobre\", \"Novembre\", \"Décembre\"],
                monthsShort: [\"Jan\", \"Fev\", \"Mar\", \"Avr\", \"Mai\", \"Jui\", \"Jul\", \"Aou\", \"Sep\", \"Oct\", \"Nov\", \"Dec\"],
                today: \"Aujourd'hui\",
                suffix: [],
                meridiem: [\"am\", \"pm\"],
                weekStart: 1,
                format: \"dd/mm/yyyy\"
            };

           \$('.datetimepicker').datetimepicker({
               format: 'dd/mm/yyyy hh:ii',
               autoclose: true,
               weekStart: 1,
               language: 'fr',
               minView: 'hour',
               maxView: 'month',
               todayHighlight: true,
               initialDate: new Date(),
               todayBtn: true
           });
           
           \$('.datepicker').datetimepicker({
               format: 'dd/mm/yyyy',
               autoclose: true,
               weekStart: 1,
               language: 'fr',
               minView: 'month',
               todayHighlight: true,
               initialDate: new Date(),
               todayBtn: true
           });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "::js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  42 => 6,  38 => 5,  29 => 3,  23 => 2,  219 => 91,  216 => 90,  213 => 89,  208 => 88,  198 => 81,  192 => 71,  189 => 70,  186 => 69,  183 => 68,  177 => 66,  174 => 65,  171 => 64,  166 => 62,  157 => 56,  148 => 51,  142 => 49,  140 => 48,  136 => 47,  130 => 45,  122 => 42,  118 => 41,  112 => 40,  97 => 30,  94 => 29,  82 => 100,  79 => 89,  76 => 88,  74 => 33,  70 => 31,  68 => 29,  53 => 17,  49 => 16,  45 => 15,  37 => 13,  27 => 5,  141 => 61,  135 => 58,  129 => 55,  124 => 43,  120 => 52,  115 => 50,  110 => 49,  104 => 34,  101 => 33,  99 => 44,  92 => 42,  88 => 13,  85 => 39,  80 => 38,  44 => 5,  41 => 14,  34 => 4,);
    }
}
