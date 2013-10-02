<?php

/* OrehaErpBundle:Erp:index.html.twig */
class __TwigTemplate_76eb1a834487d401119b0f0e9c006d6be8b0b06214d61bea690b68259c5e2ca0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaTemplate.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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

    // line 6
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Accueil";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span10\">
            ";
        // line 11
        if ($this->env->getExtension('security')->isGranted("ROLE_MANAGER")) {
            // line 12
            echo "                <div class=\"row-fluid\">
                    <div class=\"span8 well\">
                        <legend><strong>Manager: </strong> Validations de transferts en attente</legend>
                        ";
            // line 15
            if ((!twig_test_empty((isset($context["tovalidate"]) ? $context["tovalidate"] : $this->getContext($context, "tovalidate"))))) {
                // line 16
                echo "                        <blockquote>
                            <ul class=\"unstyled\">
                                ";
                // line 18
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["tovalidate"]) ? $context["tovalidate"] : $this->getContext($context, "tovalidate")));
                foreach ($context['_seq'] as $context["_key"] => $context["dossier"]) {
                    // line 19
                    echo "                                    <li>
                                        <strong>";
                    // line 20
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule")), "html", null, true);
                    echo "</strong>
                                        <span class=\"label label-success\">Affaire gagnée</span>
                                        <a href=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-mini btn-primary\">Aller au dossier pour valider</a>
                                    </li>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dossier'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "                            </ul>
                        </blockquote>
                        ";
            } else {
                // line 28
                echo "                            Pas de validation en attente.
                        ";
            }
            // line 30
            echo "                    </div>
                </div>
            ";
        }
        // line 33
        echo " 
            <div class=\"row-fluid\">
                <div class=\"span8 well\">
                    <legend>Echéances à venir:</legend>
                    ";
        // line 37
        if ((!twig_test_empty((isset($context["echeances"]) ? $context["echeances"] : $this->getContext($context, "echeances"))))) {
            // line 38
            echo "                    <blockquote>
                        <ul class=\"unstyled\">
                            ";
            // line 40
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["echeances"]) ? $context["echeances"] : $this->getContext($context, "echeances")));
            foreach ($context['_seq'] as $context["_key"] => $context["echeance"]) {
                // line 41
                echo "                                <li>
                                    <strong>";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "dossier"), "intitule"), "html", null, true);
                echo ":</strong>
                                    ";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "libelle"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "
                                    <a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute($this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "dossier"), "id"))), "html", null, true);
                echo "\" class=\"btn btn-mini btn-primary\">Aller au dossier</a>
                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['echeance'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                          
                        </ul>
                    </blockquote>
                    ";
        } else {
            // line 50
            echo "                        <div class=\"alert alert-notice\">
                            <span class=\"icon-info-sign\"></span>
                            Aucune tache à traiter.
                        </div>
                    ";
        }
        // line 55
        echo "                </div>
            </div>
            <div class=\"row-fluid\">
                <div class=\"span8 well\">
                    <legend>Rendez-vous:</legend>
                    ";
        // line 60
        if ((!twig_test_empty((isset($context["rdvs"]) ? $context["rdvs"] : $this->getContext($context, "rdvs"))))) {
            // line 61
            echo "                    <blockquote>
                        <ul class=\"unstyled\">
                            ";
            // line 63
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["rdvs"]) ? $context["rdvs"] : $this->getContext($context, "rdvs")));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 64
                echo "                                ";
                if ((!$this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "past"))) {
                    // line 65
                    echo "                                    <li>
                                        <strong>";
                    // line 66
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "dossier"), "intitule"), "html", null, true);
                    echo "</strong> -
                                        ";
                    // line 67
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "type")), "html", null, true);
                    echo " avec ";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "contact"), "fullName")), "html", null, true);
                    echo " le ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                    echo " à ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "date"), (isset($context["format_time"]) ? $context["format_time"] : $this->getContext($context, "format_time"))), "html", null, true);
                    echo "
                                        <a href=\"";
                    // line 68
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_voir", array("id" => $this->getAttribute($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "dossier"), "id"))), "html", null, true);
                    echo "\" class=\"btn btn-mini btn-primary\">Aller au dossier</a>
                                    </li>
                                ";
                }
                // line 71
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rdv'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            echo "                        </ul>
                    </blockquote>
                    ";
        } else {
            // line 75
            echo "                        <div class=\"alert alert-notice\">
                            <span class=\"icon-info-sign\"></span> Aucun rendez-vous de prévu.
                        </div>
                    ";
        }
        // line 79
        echo "                </div>
           </div>           
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Erp:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 79,  200 => 75,  195 => 72,  189 => 71,  183 => 68,  173 => 67,  169 => 66,  166 => 65,  163 => 64,  159 => 63,  155 => 61,  153 => 60,  146 => 55,  139 => 50,  133 => 46,  124 => 44,  118 => 43,  114 => 42,  111 => 41,  107 => 40,  103 => 38,  101 => 37,  95 => 33,  90 => 30,  86 => 28,  81 => 25,  72 => 22,  67 => 20,  64 => 19,  60 => 18,  56 => 16,  54 => 15,  49 => 12,  47 => 11,  42 => 8,  39 => 7,  32 => 6,);
    }
}
