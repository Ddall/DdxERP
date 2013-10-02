<?php

/* OrehaErpBundle:Dossier:list.html.twig */
class __TwigTemplate_3fd63ea9907a4328f9c3b3059d2b3c193b98fa27c27221d7ccd20edd64edd261 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaTemplate.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span10\">
            <fieldset>
                <legend>
                    Dossiers
                    ";
        // line 14
        echo "                    <a class=\"btn btn-primary\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_ajouter_vide"), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Nouveau dossier</a>
                    
                </legend>
                    <div class=\"pull-left\">
                        <span data-toggle=\"button\" class=\"btn btn-danger btn-small toggleEl\" id=\"perdu\">Dossiers perdus</span>
                        <span data-toggle=\"button\" class=\"btn btn-success btn-small toggleEl\" id=\"gagne\">Dossiers gagnés</span>
                    </div>
                    <div class=\"pull-right\">
                        <span id=\"chrono\" class=\"toggleCol btn btn-info\">#</span>
                        <span id=\"crea\" class=\"toggleCol btn btn-info\">Date creation</span>
                        <span id=\"modif\" class=\"toggleCol btn btn-info\">Date modification</span>
                    </div>
                <div class=\"row-fluid\">
                    <table class=\"table table-condensed table-hover table-striped\">
                        <thead>
                            <tr>
                                <th class=\"colchrono\">#</th>
                                <th class=\"colintitule\">Intitulé</th>
                                <th class=\"coltype\">Type</th>
                                <th class=\"colstatut\">Statut</th>
                                <th class=\"colsource\">Source</th>
                                <th class=\"colinfo\">Info</th>
                                <th class=\"colsuivi\">Suivi par</th>
                                <th class=\"colcrea\">Création</th>
                                <th class=\"colmodif\">Dernière modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
        // line 42
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listeDossiers"]) ? $context["listeDossiers"] : $this->getContext($context, "listeDossiers")));
        foreach ($context['_seq'] as $context["_key"] => $context["dossier"]) {
            // line 43
            echo "                                ";
            if (((twig_in_filter($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id"), $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "usersid")) || ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id") == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "createur"), "id"))) || $this->env->getExtension('security')->isGranted("ROLE_MANAGER"))) {
                // line 44
                echo "                                <tr class=\"islink 
                                    ";
                // line 45
                if ((null === $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "transfered"))) {
                    // line 46
                    echo "                                        warning
                                    ";
                } elseif (($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "libelle") == "gagne")) {
                    // line 48
                    echo "                                        success gagne
                                    ";
                } elseif (($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "libelle") == "perdu")) {
                    // line 50
                    echo "                                        error perdu
                                    ";
                }
                // line 52
                echo "                                        \" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\">
                                    <td class=\"colchrono\" >";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "chrono"), "html", null, true);
                echo "</td>
                                    <td class=\"colintitule\">";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule"), "html", null, true);
                echo "</td>
                                    <td class=\"coltype\">";
                // line 55
                if (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "typeDossier") == "particulier")) {
                    echo "<span class=\"label label-info\">Particulier</span>
                                        ";
                } elseif (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "typeDossier") == "professionnel")) {
                    // line 56
                    echo "<span class=\"label label-important\">Professionnel/Libéral</span>
                                        ";
                } elseif (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "typeDossier") == "sci")) {
                    // line 57
                    echo "<span class=\"label label-success\">SCI</span>
                                        ";
                } elseif (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "typeDossier") == "copropriete")) {
                    // line 58
                    echo "<span class=\"label label-warning\">Copropriété</span>
                                        ";
                }
                // line 60
                echo "                                    </td>
                                    <td class=\"colstatut\">";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "code"), "html", null, true);
                echo "</td>
                                    <td class=\"colsource\">";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "source"), "intitule"), "html", null, true);
                echo "</td>
                                    <td class=\"colinfo\">
                                        ";
                // line 64
                if ((null === $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "transfered"))) {
                    // line 65
                    echo "                                            <strong>Transfert en attente</strong>
                                        ";
                }
                // line 67
                echo "                                    </td>
                                    <td class=\"colsuivi\">";
                // line 68
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "suivipar"), "fullName")), "html", null, true);
                echo "</td>
                                    <td class=\"colcrea\">";
                // line 69
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dateCreation"), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo " par ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "createur"), "fullName"), "html", null, true);
                echo " </td>
                                    <td class=\"colmodif\">";
                // line 70
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dateDerniereModif"), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo " par ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dernierModificateur"), "fullName"), "html", null, true);
                echo " </td>
                                </tr>
                                ";
            }
            // line 73
            echo "                                
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dossier'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </div>
</div>
";
    }

    // line 83
    public function block_javascripts($context, array $blocks = array())
    {
        // line 84
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$( document ).ready(function() {
        ";
        // line 87
        if ((!$this->env->getExtension('security')->isGranted("ROLE_ADMINISTRATIF"))) {
            // line 88
            echo "            \$('.colchrono').hide();
        ";
        }
        // line 90
        echo "            
        \$('.coldatecrea').hide();

        \$('.perdu').hide();
        
        
        \$('.toggleEl').click(function(){
            \$('.'+\$(this).attr('id')).toggle();
        });
        
        \$('.toggleCol').click(function(){
            \$('.col'+\$(this).attr('id')).toggle();
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Dossier:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 90,  197 => 88,  195 => 87,  189 => 84,  186 => 83,  175 => 75,  168 => 73,  160 => 70,  154 => 69,  150 => 68,  147 => 67,  143 => 65,  141 => 64,  136 => 62,  132 => 61,  129 => 60,  125 => 58,  121 => 57,  117 => 56,  112 => 55,  108 => 54,  104 => 53,  99 => 52,  95 => 50,  91 => 48,  87 => 46,  85 => 45,  82 => 44,  79 => 43,  75 => 42,  43 => 14,  35 => 7,  32 => 6,);
    }
}
