<?php

/* OrehaErpBundle:Dossier:voir.html.twig */
class __TwigTemplate_571d79c71b2ad28379885e57613130749402400a51a3f33c999e1d2314bfdb20 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::orehaTemplate.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $this->displayParentBlock("title", $context, $blocks);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule"), "html", null, true);
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"container-fluid\">
    <div class=\"row-fluid\">
        <div class=\"span11\">
            <fieldset>
                <h2>Dossier ";
        // line 9
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "intitule")), "html", null, true);
        echo "</h2>

                ";
        // line 12
        echo "                <div class=\"row-fluid\">
                    <legend>
                        <a class=\"btn\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier"), "html", null, true);
        echo "\"><span class=\"icon-arrow-left\"></span> Retour</a>
                        <a class=\"btn btn-info\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_modifier", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-pencil\"></span>  Modifier</a>

                        <a class=\"btn btn-primary\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_rdv_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-asterisk\"></span> Nouveau Rendez-vous</a>
                        <a class=\"btn btn-primary showformCommentaire\" href=\"#comments\"><span class=\"icon-comment\"></span> Ajouter une note sur le dossier</a>
                        ";
        // line 19
        if (((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statuts"))) && (!(null === $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "transfered"))))) {
            // line 20
            echo "                            <a class=\"btn btn-success\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_transfert_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
            echo "\"><span class=\"icon-play\"></span> Transferer le dossier</a>
                        ";
        } else {
            // line 22
            echo "                            <a class=\"btn disabled\" href=\"#\"><span class=\"icon-play\"></span> Transferer le dossier</a>
                        ";
        }
        // line 24
        echo "
                        ";
        // line 26
        echo "                        <div class=\"pull-right\">
                            Statut:
                            <span class=\"label label-info\" >";
        // line 28
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "libelle")), "html", null, true);
        echo "</span>
                            
                            <div class=\"btn-group\">
                                <a class=\"btn btn-info dropdown-toggle\" data-toggle=\"dropdown\">
                                    Affaire
                                    <span class=\"caret\"></span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li><a onclick=\"return confirm('Confirmer: Affaire gagnée?');\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_gagne", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\">Affaire Gagnée</a></li>
                                    <li><a onclick=\"return confirm('Confirmer: Affaire perdue?');\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_perdu", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\">Affaire Perdue</a></li>
                                    <li class=\"divider\"></li>
                                    <li><a onclick=\"return confirm('Confirmer: Classer sans suite?');\" href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_sanssuite", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\">Sans suite</a></li>
                                </ul>
                            </div>
                        </div>
                    </legend>
                </div>
                ";
        // line 46
        echo "                ";
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statuts")))) {
            // line 47
            echo "                    ";
            if (($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "libelle") == "source")) {
                // line 48
                echo "                        <div class=\"row-fluid\">
                            <div class=\"alert alert-danger\">
                                <strong><span class=\"icon-warning-sign\"></span> Ce dossier est à l'état sourcing depuis le ";
                // line 50
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "dateCreation"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo " </strong><br>
                                Vous devez affecter le dossier à quelqu'un.
                                <a href=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_transfert_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-big btn-success\"><span class=\"icon-play\"></span> Transferer le dossier</a>
                                
                            </div>
                        </div>
                    ";
            } elseif (($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "libelle") == "gagne")) {
                // line 57
                echo "                        <div class=\"row-fluid\">
                            <div class=\"alert alert-success\">
                                <h2>Dossier en attente de validation</h2>
                                <blockquote>
                                    ";
                // line 61
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "createur"), "fullName")), "html", null, true);
                echo " signale que cette affaire à été remportée le ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "dateCreation"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo ".<br>
                                    <strong>Vous devez valider cette étape pour passer ce dossier en client</strong><br>
                                </blockquote>
                                <a href=\"";
                // line 64
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_transfert_valider_client", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-success\"><span class=\"icon-thumbs-up\"></span> Valider le statut client</a>
                                <a href=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_transfert_refuser_client", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-danger\"><span class=\"icon-thumbs-down\"></span> Refuser le statut client</a>
                            </div>
                        </div>
                    ";
            } elseif ((null === $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "transfered"))) {
                // line 69
                echo "                        <div class=\"row-fluid\">
                            <div class=\"alert alert-danger\">
                                <strong><span class=\"icon-warning-sign\"></span> Ce dossier est en attente de transfert depuis le ";
                // line 71
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "dateCreation"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo " </strong>
                                ";
                // line 72
                if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id") == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "suiviPar"), "id"))) {
                    // line 73
                    echo "                                    <a class=\"btn btn-success btn-primary\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_statut_valider", array("id" => $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "id"))), "html", null, true);
                    echo "\" onclick=\"return confirm('Accepter le transfert?');\"><strong><span class=\"icon-play\"></span> Le transfert à bien été effectué.</strong></a>
                                    <a class=\"btn btn-danger btn-primary\" href=\"";
                    // line 74
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_statut_refuser", array("id" => $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "id"))), "html", null, true);
                    echo "\" onclick=\"return confirm('Ceci annulera le transfert. Continuer?');\"><strong><span class=\"icon-stop\"></span> Refuser le transfert.</strong></a>
                                ";
                } elseif (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "id") == $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "createur"), "id"))) {
                    // line 76
                    echo "                                    <a class=\"btn btn-danger btn-primary\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_statut_refuser", array("id" => $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "id"))), "html", null, true);
                    echo "\" onclick=\"return confirm('Ceci annulera le transfert. Continuer?');\"><strong><span class=\"icon-stop\"></span> Annuler le transfert.</strong></a>
                                ";
                }
                // line 78
                echo "                            </div>
                        </div>
                    ";
            }
            // line 81
            echo "                ";
        }
        // line 82
        echo "                
                ";
        // line 84
        echo "                ";
        if (twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "contacts"))) {
            // line 85
            echo "                    <div class=\"row-fluid\">
                        <div class=\"alert alert-warning\">
                            <span class=\"icon-envelope\"></span> Il n'y a pas de contacts liés à ce dossier. 
                            <a class=\"btn btn-primary btn-small\" href=\"#contacts\"><span class=\"icon-plus\"></span> Ajouter un contact</a>
                        </div>
                    </div>
                ";
        }
        // line 92
        echo "                
                ";
        // line 93
        if (twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "biens"))) {
            // line 94
            echo "                    <div class=\"row-fluid\">
                        <div class=\"alert alert-warning\">
                            <span class=\"icon-home\"></span> Il n'y a aucun bien dans ce dossier.
                            <a href=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_bien_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
            echo "\" class=\"btn btn-small btn-primary\"><span class=\"icon-plus\"></span> Ajouter un bien</a>
                        </div>
                    </div>
                ";
        }
        // line 101
        echo "                
                ";
        // line 103
        echo "                <div class=\"row-fluid well\">
                    <div class=\"span4\">
                        <strong>Appréciation:</strong>
                            ";
        // line 106
        if (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "appreciation") == "positive")) {
            // line 107
            echo "                                <span class=\"label label-success\"><span class=\"icon-thumbs-up\"></span> Positive </span>
                            ";
        } elseif (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "appreciation") == "neutre")) {
            // line 109
            echo "                                <span class=\"label label-info\"><span class=\"icon-hand-right\"></span> Neutre </span>
                            ";
        } else {
            // line 111
            echo "                                <span class=\"label label-important\"><span class=\"icon-thumbs-down\"></span> Negative </span>
                            ";
        }
        // line 112
        echo "<br>
                        <strong>Chrono dossier:</strong> ";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "chrono"), "html", null, true);
        echo "<br>
                        <strong>Statut actuel: </strong>";
        // line 114
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "code"), "html", null, true);
        echo " (depuis le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "dateCreation"), "d/m/y"), "html", null, true);
        echo ")<br>
                        <strong>Dossier suivi par: </strong> ";
        // line 115
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "suiviPar"), "fullName")), "html", null, true);
        echo "<br>
                        <strong>Source: </strong> ";
        // line 116
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "source"), "intitule"), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "source"), "type")), "html", null, true);
        echo ")<br>
                        <strong>Dernier Budget: </strong> ";
        // line 117
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "budget"), "html", null, true);
        echo "<br>
                        <strong>Dernier Chiffrage: </strong> ";
        // line 118
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statut"), "chiffrage"), "html", null, true);
        echo "<br>
                        ";
        // line 119
        if ((!(null === $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "description")))) {
            // line 120
            echo "                            <strong>Description:</strong><br>
                            ";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "description"), "html", null, true);
            echo "<br>
                        ";
        }
        // line 123
        echo "                    </div>
                        
                    <div class=\"span8\">
                        ";
        // line 127
        echo "                        <div class=\"row-fluid\">
                            <legend>
                                <strong>Rendez-vous</strong>
                                <a class=\"btn btn-primary btn-small\" href=\"";
        // line 130
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_rdv_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\" ><span class=\"icon-plus\"></span> Nouveau RDV</a>
                            </legend>
                            ";
        // line 132
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "rendezvouss")))) {
            // line 133
            echo "                                <table class=\"table table-condensed table-bordered table-hover table-striped\">
                                    <thead>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Contact</th>
                                        <th>Lieu</th>
                                        <th>Modifier Supprimer</th>
                                    </thead>
                                    <tbody>
                                        ";
            // line 142
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "rendezvouss"));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 143
                echo "                                            <tr class=\"";
                if ($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "isPast")) {
                    echo "warning";
                } else {
                    echo "succes";
                }
                echo "\">
                                                <td>";
                // line 144
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "type")), "html", null, true);
                echo "</td>
                                                <td>";
                // line 145
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo "</td>
                                                <td>";
                // line 146
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "contact"), "fullName")), "html", null, true);
                echo "</td>
                                                <td>";
                // line 147
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "lieu"), "fullAdresse"), "html", null, true);
                echo "</td>
                                                <td>
                                                    <a href=\"";
                // line 149
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_rdv_voir", array("id" => $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-small\"><span class=\"icon-edit\"></span> Modifier</a>
                                                    <a onclick=\"return confirm('Supprimer ce rendez-vous?');\" href=\"";
                // line 150
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_rdv_supprimer", array("id" => $this->getAttribute((isset($context["rdv"]) ? $context["rdv"] : $this->getContext($context, "rdv")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-small btn-warning\"><span class=\"icon-remove\"></span>  Supprimer</a>
                                                </td>
                                            </tr>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rdv'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            echo "                                    </tbody>
                                </table>
                            ";
        } else {
            // line 157
            echo "                                <div class=\"alert alert-warning\">
                                    <strong>Il n'y a pas de RDV dans ce dossier... </strong>
                                    <a class=\"btn btn-warning btn-small\" href=\"";
            // line 159
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_rdv_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
            echo "\" ><span class=\"icon-asterisk\"></span> Planifier rendez-vous</a>
                                </div>
                            ";
        }
        // line 162
        echo "                        </div>
                        <div class=\"row-fluid\">
                            <legend>
                                <strong>Echéances </strong>
                                <a class=\"btn btn-primary btn-small\" href=\"";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_echeance_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Planifier une tache</a>
                            </legend>
                            ";
        // line 168
        if (twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "echeances"))) {
            // line 169
            echo "                                <div class=\"alert alert-info\">
                                    <strong>Il n'y a pas d'échéances prévues pour ce dossier.</strong> <a class=\"btn btn-info btn-small\" href=\"";
            // line 170
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_echeance_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
            echo "\"><span class=\"icon-plus\"></span> Planifier une tache</a>
                                </div>
                            ";
        } else {
            // line 173
            echo "                            <table class=\"table table-striped table-bordered table-condensed table-hover\">
                                    <thead>
                                        <th>Titre</th>
                                        <th>Date d'échéance</th>
                                        <th>Avancement %</th>
                                        <th><span class=\"icon-edit\"></span></th>
                                    </thead>
                                    <tbody>
                                        ";
            // line 181
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "echeances"));
            foreach ($context['_seq'] as $context["_key"] => $context["echeance"]) {
                // line 182
                echo "                                            <tr id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_echeance_voir", array("id" => $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "id"))), "html", null, true);
                echo "\" class=\"islink ";
                if (($this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "avancement") == 100)) {
                    echo "success";
                } elseif (($this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "avancement") > 1)) {
                    echo "info";
                } else {
                    echo "warning";
                }
                echo "\">
                                                <td><strong>";
                // line 183
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "libelle")), "html", null, true);
                echo "</strong></td>
                                                <td>";
                // line 184
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "date"), (isset($context["format_datetime"]) ? $context["format_datetime"] : $this->getContext($context, "format_datetime"))), "html", null, true);
                echo "</td>
                                                <td>
                                                    <div class=\"progress progress-success progress-striped\">
                                                        <div class=\"bar\" style=\"width: ";
                // line 187
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "avancement"), "html", null, true);
                echo "%\" >";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "avancement"), "html", null, true);
                echo "%</div>
                                                    </div>
                                                </td>
                                                <td><a href=\"";
                // line 190
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_echeance_modifier", array("id" => $this->getAttribute((isset($context["echeance"]) ? $context["echeance"] : $this->getContext($context, "echeance")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-small\">Mise à jour tache</a></td>
                                            </tr>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['echeance'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 193
            echo "                                    </tbody>
                                </table>
                            ";
        }
        // line 196
        echo "
                        </div>
                    </div>
                </div>

                ";
        // line 202
        echo "                <div class=\"well row-fluid\">
                    <h2>Biens <a href=\"";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_bien_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-small btn-primary\"><span class=\"icon-plus\"></span> Ajouter un bien</a></h2>
                    ";
        // line 204
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "biens")))) {
            // line 205
            echo "                        <ul class=\"thumbnails\">
                            ";
            // line 206
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "biens"));
            foreach ($context['_seq'] as $context["_key"] => $context["bien"]) {
                // line 207
                echo "                                <li class=\"span4\">
                                    <div class=\"thumbnail\">
                                        <div class=\"caption\">
                                            <p>
                                                <strong>Type:</strong> ";
                // line 211
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["bien"]) ? $context["bien"] : $this->getContext($context, "bien")), "type")), "html", null, true);
                echo "<br>
                                                <strong>Surface:</strong> ";
                // line 212
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bien"]) ? $context["bien"] : $this->getContext($context, "bien")), "surface"), "html", null, true);
                echo " m²<br>
                                                <strong>Valeur avant travaux:</strong> ";
                // line 213
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["bien"]) ? $context["bien"] : $this->getContext($context, "bien")), "valeurAvantTravaux"), "html", null, true);
                echo "<br>
                                                <strong>Lieu:</strong> ";
                // line 214
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["bien"]) ? $context["bien"] : $this->getContext($context, "bien")), "adresse"), "fullAdresse")), "html", null, true);
                echo "<br>
                                            </p>
                                            <p>
                                                <a class=\"btn btn-info\" href=\"";
                // line 217
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_bien_voir", array("id" => $this->getAttribute((isset($context["bien"]) ? $context["bien"] : $this->getContext($context, "bien")), "id"))), "html", null, true);
                echo "\"> Voir</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['bien'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            echo "   
                        </ul>
                    ";
        } else {
            // line 225
            echo "                        <div class=\"alert alert-warning span8\">
                            <span class=\"icon-home\"></span> Il n'y a aucun bien dans ce dossier.
                        </div>
                    ";
        }
        // line 229
        echo "                </div>
                
                ";
        // line 232
        echo "                <div class=\"well row-fluid\" id=\"contacts\">
                    <h2>Contacts 
                        <a href=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_ajouter_contact", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-small btn-primary\" ><span class=\"icon-plus\"></span> Nouveau contact</a>
                    </h2>
                        
                    ";
        // line 237
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "contacts")))) {
            // line 238
            echo "                        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "contacts"));
            foreach ($context['_seq'] as $context["_key"] => $context["contact"]) {
                // line 239
                echo "                            <div class=\"span3 well\">
                                <address>
                                    <strong>";
                // line 241
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "prenom")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "nom")), "html", null, true);
                echo " </strong>
                                    <a href=\"";
                // line 242
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_contact_voir", array("id" => $this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "id"))), "html", null, true);
                echo "\" class=\"btn btn-info btn-small\" >Fiche contact</a>
                                    <br>
                                    ";
                // line 244
                if (($this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "type") == "part")) {
                    // line 245
                    echo "                                    <span class=\"label label-success\">Particulier</span><br>
                                    ";
                } else {
                    // line 247
                    echo "                                    Société : ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "societe"), "html", null, true);
                    echo "<br>
                                    ";
                }
                // line 249
                echo "                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "telephones"));
                foreach ($context['_seq'] as $context["_key"] => $context["telephone"]) {
                    // line 250
                    echo "                                        ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["telephone"]) ? $context["telephone"] : $this->getContext($context, "telephone")), "numero"), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["telephone"]) ? $context["telephone"] : $this->getContext($context, "telephone")), "libelle"), "html", null, true);
                    echo ")<br>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['telephone'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 252
                echo "                                    ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")), "emails"));
                foreach ($context['_seq'] as $context["_key"] => $context["email"]) {
                    // line 253
                    echo "                                        <a href=\"mailto:";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "email"), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "email"), "html", null, true);
                    echo "</a> (";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "libelle"), "html", null, true);
                    echo ")<br>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['email'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 255
                echo "                                </address>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contact'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 258
            echo "                    ";
        } else {
            // line 259
            echo "                        <div class=\"alert alert-notice span8\">
                            <span class=\"icon-envelope\"></span> Il n'y a pas de contacts liés à ce dossier.
                        </div>
                    ";
        }
        // line 263
        echo "                </div>   
                
                ";
        // line 266
        echo "                <div id=\"comments\" class=\"well row-fluid\">
                    <h2>
                        Notes sur le dossier 
                        <a class=\"btn btn-small btn-primary showformCommentaire\"><span class=\"icon-plus\"></span> Ajouter un commentaire</a>
                    </h2>
                    <div id=\"formCommentaire\">
                        <form  method=\"post\" ";
        // line 272
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formCommentaire"]) ? $context["formCommentaire"] : $this->getContext($context, "formCommentaire")), 'enctype');
        echo ">
                            <legend>";
        // line 273
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommentaire"]) ? $context["formCommentaire"] : $this->getContext($context, "formCommentaire")), "message"), 'label');
        echo "</legend>
                            ";
        // line 274
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formCommentaire"]) ? $context["formCommentaire"] : $this->getContext($context, "formCommentaire")), "message"), 'widget');
        echo "<br>
                            <input type=\"submit\" class=\"btn btn-primary\" />
                        </form>
                    </div>
                    
                    ";
        // line 279
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "commentaires")))) {
            // line 280
            echo "                        <ul class=\"unstyled\">
                            ";
            // line 281
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "commentaires"));
            foreach ($context['_seq'] as $context["_key"] => $context["commentaire"]) {
                // line 282
                echo "                                <li>
                                    <blockquote>
                                        <small>
                                            ";
                // line 285
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "createur"), "fullName"), "html", null, true);
                echo " le ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "dateCreation"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo " à ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "dateCreation"), (isset($context["format_time"]) ? $context["format_time"] : $this->getContext($context, "format_time"))), "html", null, true);
                echo " 
                                            <span class=\"notecontrol\">
                                                <a href=\"";
                // line 287
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_commentaire_modifier", array("id" => $this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "id"), "idDossier" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\" class=\"label\"><span class=\"icon-edit\"></span> Modifier</a>
                                                <a onclick=\"return confirm('Supprimer ce message?');\" href=\"";
                // line 288
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_commentaire_supprimer", array("id" => $this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "id"), "idDossier" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
                echo "\" class=\"label label-warning\"><span class=\"icon-remove\"></span> Supprimer</a>
                                            <span>
                                        </small>
                                        ";
                // line 291
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["commentaire"]) ? $context["commentaire"] : $this->getContext($context, "commentaire")), "message"), "html", null, true);
                echo "
                                    </blockquote>
                                </li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['commentaire'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 295
            echo "                        </ul>
                    ";
        } else {
            // line 297
            echo "                        <div class=\"alert alert-info span8\">
                            <span class=\"icon-info-sign\"></span> Ce dossier n'a pas encore de commentaires.
                        </div>
                    ";
        }
        // line 301
        echo "                    
                </div>
                    
                ";
        // line 305
        echo "                <div class=\"row-fluid well\">
                    <h2>
                        Financement
                        <a href=\"";
        // line 308
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_pret_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\" class=\"btn btn-small btn-primary\"><span class=\"icon-plus\"></span> Ajouter un financement</a>
                    </h2>
                    ";
        // line 310
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "prets")))) {
            // line 311
            echo "                        <div class=\"span5\">
                            <table class=\"table table-hover table-striped table-condensed\">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type/Nom</th>
                                        <th>Banque</th>
                                        <th>Montant</th>
                                        <th>Taux</th>
                                        <th>Date de demande</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 324
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "prets"));
            foreach ($context['_seq'] as $context["_key"] => $context["pret"]) {
                // line 325
                echo "                                        <tr  class=\"islink\" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_pret_voir", array("id" => $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "id"))), "html", null, true);
                echo "\">
                                            <td></td>
                                            <td>";
                // line 327
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "nom"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 328
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "banque"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 329
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "montant"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 330
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "taux"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 331
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["pret"]) ? $context["pret"] : $this->getContext($context, "pret")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "</td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pret'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 334
            echo "                                        <tr class=\"info\">
                                            <td colspan=\"3\" ><strong>Capacité de financement totale:</strong></td>
                                            <td>";
            // line 336
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "montantTotalPrets"), "html", null, true);
            echo " €</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    ";
        } else {
            // line 342
            echo "                        <div class=\"alert alert-info span8\">
                            <span class=\"icon-info-sign\"></span> Aucun prêt pour ce dossier.
                        </div>
                    ";
        }
        // line 346
        echo "                </div>
                
                ";
        // line 349
        echo "                <div id=\"facturation\" class=\"row-fluid well\">
                    <h2>
                        Facturation
                        <a class=\"btn btn-small btn-primary\" href=\"";
        // line 352
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_facture_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Saisir une facture</a>
                        <a class=\"btn btn-small btn-primary\" href=\"";
        // line 353
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_payement_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Saisir un paiement</a>
                    </h2>
                    ";
        // line 355
        if (((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "payements"))) || (!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "factures"))))) {
            // line 356
            echo "                        <table class=\"table table-hover table-striped table-condensed\">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Libellé</th>
                                    <th>Date</th>
                                    <th>Echéance</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 367
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "factures"));
            foreach ($context['_seq'] as $context["_key"] => $context["facture"]) {
                // line 368
                echo "                                    <tr class=\"islink\" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_facture_voir", array("id" => $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "id"))), "html", null, true);
                echo "\">
                                        <td>
                                            ";
                // line 370
                if (($this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "montantTTC") >= 0)) {
                    // line 371
                    echo "                                               Facture
                                            ";
                } else {
                    // line 373
                    echo "                                                Avoir
                                            ";
                }
                // line 374
                echo " 
                                            - ";
                // line 375
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "chronoFacture"), "html", null, true);
                echo "
                                        </td>
                                        <td>";
                // line 377
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "libelle"), "html", null, true);
                echo " </td>
                                        <td>";
                // line 378
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "</td>
                                        <td>";
                // line 379
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "echeance"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "</td>
                                        <td>";
                // line 380
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["facture"]) ? $context["facture"] : $this->getContext($context, "facture")), "montantTTC"), "html", null, true);
                echo "€</td>
                                    </tr>

                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['facture'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 384
            echo "                                <tr class=\"info\">
                                    <td colspan=\"4\"><span class=\"pull-right\"><strong>Total Facturé:</strong></span></td>
                                    <td colspan=\"1\"> ";
            // line 386
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "totalFacture"), "html", null, true);
            echo "€</td>
                                </tr>
                                ";
            // line 388
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "payements"));
            foreach ($context['_seq'] as $context["_key"] => $context["payement"]) {
                // line 389
                echo "                                    <tr class=\"islink\" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_payement_voir", array("id" => $this->getAttribute((isset($context["payement"]) ? $context["payement"] : $this->getContext($context, "payement")), "id"))), "html", null, true);
                echo "\">
                                        <td>
                                            Reglement
                                            (";
                // line 392
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["payement"]) ? $context["payement"] : $this->getContext($context, "payement")), "mode")), "html", null, true);
                echo ")
                                        </td>
                                        <td>";
                // line 394
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["payement"]) ? $context["payement"] : $this->getContext($context, "payement")), "libelle"), "html", null, true);
                echo "</td>
                                        <td>";
                // line 395
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["payement"]) ? $context["payement"] : $this->getContext($context, "payement")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "</td>
                                        <td></td>
                                        <td>";
                // line 397
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["payement"]) ? $context["payement"] : $this->getContext($context, "payement")), "montant"), "html", null, true);
                echo "€</td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payement'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 400
            echo "                                <tr class=\"info\">
                                    <td colspan=\"4\">
                                        <span class=\"pull-right\"><strong>Total Payé:</strong></span>
                                    </td>
                                    <td colspan=\"1\">
                                         ";
            // line 405
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "totalPaye"), "html", null, true);
            echo "€
                                    </td>
                                </tr>
                                <tr class=\"
                                ";
            // line 409
            if (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "balanceFacturation") > 0)) {
                // line 410
                echo "                                    success
                                ";
            } elseif (($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "balanceFacturation") < 0)) {
                // line 412
                echo "                                    error
                                ";
            }
            // line 413
            echo "\">
                                    <td colspan=\"4\">
                                        <span class=\"pull-right\"><strong>Encours actuel: </strong></span>
                                    </td>
                                    <td colspan=\"1\">
                                        ";
            // line 418
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "balanceFacturation"), "html", null, true);
            echo "€
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    ";
        } else {
            // line 425
            echo "                        <span class=\"alert alert-info span8\"><span class=\"icon-info-sign\"></span> Aucune facture ou réglements pour ce dossier.</span>
                    ";
        }
        // line 427
        echo "                </div>
                ";
        // line 429
        echo "                <div id=\"prestations\" class=\"row-fluid well\">
                    <h2>
                        Prestations
                        <a class=\"btn btn-small btn-primary\" href=\"";
        // line 432
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_prestation_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Nouvelle prestation</a>
                    </h2>
                    ";
        // line 434
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "prestations")))) {
            // line 435
            echo "                        <div class=\"span8\">
                            <table class=\"table table-hover table-striped table-condensed\">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Montant</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 445
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "prestations"));
            foreach ($context['_seq'] as $context["_key"] => $context["prestation"]) {
                // line 446
                echo "                                        <tr class=\"islink\" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_prestation_voir", array("id" => $this->getAttribute((isset($context["prestation"]) ? $context["prestation"] : $this->getContext($context, "prestation")), "id"))), "html", null, true);
                echo "\">
                                            <td>";
                // line 447
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["prestation"]) ? $context["prestation"] : $this->getContext($context, "prestation")), "famille"), "nom"), "html", null, true);
                echo "</td>
                                            <td>
                                                ";
                // line 449
                if ((!(null === $this->getAttribute((isset($context["prestation"]) ? $context["prestation"] : $this->getContext($context, "prestation")), "montant")))) {
                    // line 450
                    echo "                                                    ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["prestation"]) ? $context["prestation"] : $this->getContext($context, "prestation")), "montant"), "html", null, true);
                    echo "€
                                                ";
                } else {
                    // line 452
                    echo "                                                    <span class=\"text-success\">Prestation gratuite</span>
                                                ";
                }
                // line 454
                echo "                                            </td>
                                            <td>";
                // line 455
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["prestation"]) ? $context["prestation"] : $this->getContext($context, "prestation")), "dateCreation"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))), "html", null, true);
                echo "</td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['prestation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 458
            echo "                                        <tr class=\"info\">
                                            <td><strong>Total</strong></td>
                                            <td>";
            // line 460
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "montantTotalPrestations")), "html", null, true);
            echo "€</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    ";
        } else {
            // line 466
            echo "                        <div class=\"alert alert-info span8\">
                            <span class=\"icon-info-sign\"></span> Aucune prestation pour ce dossier.
                        </div>
                    ";
        }
        // line 470
        echo "                </div>
                
                ";
        // line 473
        echo "                <div class=\"row-fluid well\">
                    <h2>
                        Devis
                        <a class=\"btn btn-small btn-primary\" href=\"";
        // line 476
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_devis_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Saisir un devis</a>
                    </h2>
                    ";
        // line 478
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "deviss")))) {
            // line 479
            echo "                        <div class=\"span8\">
                            <table class=\"table table-hover table-striped table-condensed\">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date du devis</th>
                                        <th>Remis au client</th>
                                        <th>Montant HT</th>
                                        <th>Montant TVA Normale</th>
                                        <th>Montant TVA Reduite</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
            // line 492
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "deviss"));
            foreach ($context['_seq'] as $context["_key"] => $context["devis"]) {
                // line 493
                echo "                                        <tr class=\"islink
                                            ";
                // line 494
                if ((!(null === $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "dateSignature")))) {
                    // line 495
                    echo "                                                success
                                            ";
                } elseif ((!(null === $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "dateRefus")))) {
                    // line 497
                    echo "                                                error
                                            ";
                } elseif ((!(null === $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "dateRemise")))) {
                    // line 499
                    echo "                                                info
                                            ";
                } else {
                    // line 501
                    echo "                                                warning
                                            ";
                }
                // line 503
                echo "                                            \" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_devis_voir", array("id" => $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "id"))), "html", null, true);
                echo "\">
                                            <td>";
                // line 504
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "chronoDevis"), "html", null, true);
                echo "</td>
                                            <td>";
                // line 505
                echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "date"))) ? ("") : (twig_date_format_filter($this->env, $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "date"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))))), "html", null, true);
                echo "</td>
                                            <td>";
                // line 506
                echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "dateRemise"))) ? ("Pas encore remis") : (twig_date_format_filter($this->env, $this->getAttribute((isset($context["devis"]) ? $context["devis"] : $this->getContext($context, "devis")), "dateRemise"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))))), "html", null, true);
                echo "</td>
                                            <td>";
                // line 507
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantHT", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantHT"), "")) : ("")), "html", null, true);
                echo "</td>
                                            <td>";
                // line 508
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantTVANormale", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantTVANormale"), "")) : ("")), "html", null, true);
                echo "</td>
                                            <td>";
                // line 509
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantTVAReduite", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["devis"]) ? $context["devis"] : null), "montantTVAReduite"), "")) : ("")), "html", null, true);
                echo "</td>
                                        </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['devis'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 512
            echo "                                </tbody>
                            </table>
                        </div>
                    ";
        } else {
            // line 516
            echo "                        <div class=\"alert alert-info span8\">
                            <span class=\"icon-info-sign\"></span> Aucun devis pour ce dossier.
                        </div>
                    ";
        }
        // line 520
        echo "                        
                </div>
                
                ";
        // line 524
        echo "                <div class=\"row-fluid well\">
                    <div class=\"span11\">
                        <h2>
                            Déclarations Administratives
                            <a class=\"btn btn-small btn-primary\" href=\"";
        // line 528
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_declaration_ajouter", array("id" => $this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "id"))), "html", null, true);
        echo "\"><span class=\"icon-plus\"></span> Ajouter une déclaration</a>
                        </h2>

                        ";
        // line 531
        if ((!twig_test_empty($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "declarations")))) {
            // line 532
            echo "                            <div class=\"span8\">
                                <table class=\"table table-hover table-striped table-condensed\">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Date de la demande</th>
                                            <th>Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        ";
            // line 544
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "declarations"));
            foreach ($context['_seq'] as $context["_key"] => $context["declaration"]) {
                // line 545
                echo "                                            <tr class=\"islink ";
                echo ((($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "statut") == "accepte")) ? ("success") : (""));
                echo "\" id=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oreha_erp_dossier_declaration_voir", array("id" => $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "id"))), "html", null, true);
                echo "\">
                                                <td>";
                // line 546
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "famille"), "nom")), "html", null, true);
                echo "</td>
                                                <td>";
                // line 547
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "nom"), "html", null, true);
                echo "</td>
                                                <td>";
                // line 548
                echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "dateDepot"))) ? ("") : (twig_date_format_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "dateDepot"), (isset($context["format_date"]) ? $context["format_date"] : $this->getContext($context, "format_date"))))), "html", null, true);
                echo "</td>
                                                <td>";
                // line 549
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "statut"), "html", null, true);
                echo "</td>
                                            </tr>
                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['declaration'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 552
            echo "
                                    </tbody>
                                </table>
                            </div>
                        ";
        } else {
            // line 557
            echo "                            <div class=\"alert alert-info span8\">
                                <span class=\"icon-info-sign\"></span> Pas de déclarations administratives pour ce dossier.
                            </div>
                        ";
        }
        // line 561
        echo "
                    </div>
                </div>
                
                ";
        // line 566
        echo "                <div class=\"row-fluid well\">
                    <div class=\"\">
                        <div class=\"span11\">
                            <h2>
                                Historique 
                            </h2>
                            <blockquote>
                                Créé par ";
        // line 573
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "createur"), "fullName"), "html", null, true);
        echo " le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dateCreation"), "date"), "d/m/y H:i"), "html", null, true);
        echo "<br>
                                Dernière modification par ";
        // line 574
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dernierModificateur"), "fullName"), "html", null, true);
        echo " le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "dateDerniereModif"), "date"), "d/m/y H:i"), "html", null, true);
        echo "<br>  
                            </blockquote>
                            <table class=\"table table-hover table-striped table-condensed\">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Transfert par</th>
                                        <th>Suivi par</th>
                                        <th>Date</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
        // line 587
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dossier"]) ? $context["dossier"] : $this->getContext($context, "dossier")), "statuts"));
        foreach ($context['_seq'] as $context["_key"] => $context["statut"]) {
            // line 588
            echo "                                        <tr>
                                            <td>";
            // line 589
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["statut"]) ? $context["statut"] : $this->getContext($context, "statut")), "libelle"), "html", null, true);
            echo " <b>";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["statut"]) ? $context["statut"] : $this->getContext($context, "statut")), "code")), "html", null, true);
            echo "</b></td>
                                            <td>";
            // line 590
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statut"]) ? $context["statut"] : $this->getContext($context, "statut")), "createur"), "fullName"), "html", null, true);
            echo "</td>
                                            <td>";
            // line 591
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statut"]) ? $context["statut"] : $this->getContext($context, "statut")), "suiviPar"), "fullName"), "html", null, true);
            echo "</td>
                                            <td>";
            // line 592
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["statut"]) ? $context["statut"] : $this->getContext($context, "statut")), "dateCreation"), "date"), "d/m/y H:i"), "html", null, true);
            echo " </td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['statut'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 595
        echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
";
    }

    // line 605
    public function block_javascripts($context, array $blocks = array())
    {
        // line 606
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(document).ready(function(){
        \$('#formCommentaire').hide();
       \$('.showformCommentaire').click(function(){
          \$('#formCommentaire').slideToggle();
       });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "OrehaErpBundle:Dossier:voir.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1323 => 606,  1320 => 605,  1307 => 595,  1298 => 592,  1294 => 591,  1290 => 590,  1284 => 589,  1281 => 588,  1277 => 587,  1259 => 574,  1253 => 573,  1244 => 566,  1238 => 561,  1232 => 557,  1225 => 552,  1216 => 549,  1212 => 548,  1208 => 547,  1204 => 546,  1197 => 545,  1193 => 544,  1179 => 532,  1177 => 531,  1171 => 528,  1165 => 524,  1160 => 520,  1154 => 516,  1148 => 512,  1139 => 509,  1135 => 508,  1131 => 507,  1127 => 506,  1123 => 505,  1119 => 504,  1114 => 503,  1110 => 501,  1106 => 499,  1102 => 497,  1098 => 495,  1096 => 494,  1093 => 493,  1089 => 492,  1074 => 479,  1072 => 478,  1067 => 476,  1062 => 473,  1058 => 470,  1052 => 466,  1043 => 460,  1039 => 458,  1030 => 455,  1027 => 454,  1023 => 452,  1017 => 450,  1015 => 449,  1010 => 447,  1005 => 446,  1001 => 445,  989 => 435,  987 => 434,  982 => 432,  977 => 429,  974 => 427,  970 => 425,  960 => 418,  953 => 413,  949 => 412,  945 => 410,  943 => 409,  936 => 405,  929 => 400,  920 => 397,  915 => 395,  911 => 394,  906 => 392,  899 => 389,  895 => 388,  890 => 386,  886 => 384,  876 => 380,  872 => 379,  868 => 378,  864 => 377,  859 => 375,  856 => 374,  852 => 373,  848 => 371,  846 => 370,  840 => 368,  836 => 367,  823 => 356,  821 => 355,  816 => 353,  812 => 352,  807 => 349,  803 => 346,  797 => 342,  788 => 336,  784 => 334,  775 => 331,  771 => 330,  767 => 329,  763 => 328,  759 => 327,  753 => 325,  749 => 324,  734 => 311,  732 => 310,  727 => 308,  722 => 305,  717 => 301,  711 => 297,  707 => 295,  697 => 291,  691 => 288,  687 => 287,  678 => 285,  673 => 282,  669 => 281,  666 => 280,  664 => 279,  656 => 274,  652 => 273,  648 => 272,  640 => 266,  636 => 263,  630 => 259,  627 => 258,  619 => 255,  606 => 253,  601 => 252,  590 => 250,  585 => 249,  579 => 247,  575 => 245,  573 => 244,  568 => 242,  562 => 241,  558 => 239,  553 => 238,  551 => 237,  545 => 234,  541 => 232,  537 => 229,  531 => 225,  526 => 222,  514 => 217,  508 => 214,  504 => 213,  500 => 212,  496 => 211,  490 => 207,  486 => 206,  483 => 205,  481 => 204,  477 => 203,  474 => 202,  467 => 196,  462 => 193,  453 => 190,  445 => 187,  439 => 184,  435 => 183,  422 => 182,  418 => 181,  408 => 173,  402 => 170,  399 => 169,  397 => 168,  392 => 166,  386 => 162,  380 => 159,  376 => 157,  371 => 154,  361 => 150,  357 => 149,  352 => 147,  348 => 146,  344 => 145,  340 => 144,  331 => 143,  327 => 142,  316 => 133,  314 => 132,  309 => 130,  304 => 127,  299 => 123,  294 => 121,  291 => 120,  289 => 119,  285 => 118,  281 => 117,  275 => 116,  271 => 115,  264 => 114,  260 => 113,  257 => 112,  253 => 111,  249 => 109,  245 => 107,  243 => 106,  238 => 103,  235 => 101,  228 => 97,  223 => 94,  221 => 93,  218 => 92,  209 => 85,  206 => 84,  203 => 82,  200 => 81,  195 => 78,  189 => 76,  184 => 74,  179 => 73,  177 => 72,  173 => 71,  169 => 69,  162 => 65,  158 => 64,  150 => 61,  144 => 57,  136 => 52,  131 => 50,  127 => 48,  124 => 47,  121 => 46,  112 => 39,  107 => 37,  103 => 36,  92 => 28,  88 => 26,  85 => 24,  81 => 22,  75 => 20,  73 => 19,  68 => 17,  63 => 15,  59 => 14,  55 => 12,  50 => 9,  44 => 5,  41 => 4,  33 => 3,);
    }
}
