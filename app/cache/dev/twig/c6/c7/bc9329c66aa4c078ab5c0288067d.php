<?php

/* AcmeStoreBundle:llibreria:BuscaLlibre.html.twig */
class __TwigTemplate_c6c7bc9329c66aa4c078ab5c0288067d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeStoreBundle::layoutFrontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeStoreBundle::layoutFrontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Llibreria 22@";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 8
        echo "
\t\t<div class=\"contentnot\">
\t\t\t<div class=\"tit_fixN\">
\t\t\t\t";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_title", array(), "messages");
        // line 12
        echo "\t\t\t</div>
\t\t\t
\t\t\t<div class=\"res_el\">
\t\t\t\t<div class=\"recer_int\">
\t\t\t\t";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_desc", array(), "messages");
        // line 17
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"pres_el_res\">
\t\t\t\t<div class=\"recer_int\">
\t\t\t\t";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_mots_acerca", array(), "messages");
        echo "<br>
\t\t\t\t<div id=\"search_bar\">
\t\t\t\t\t<input class=\"inputs_cer\" id=\"cercainput\" type=\"text\">
\t\t\t\t</div>
\t\t\t\t\t<div id=\"b_search\" onclick=\"search()\">
\t\t\t\t</div>
\t\t\t\t<p>";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_desc_2", array(), "messages");
        echo "</p>
\t\t\t\t<span class=\"ce\">";
        // line 28
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_clic", array(), "messages");
        echo "</span>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"not_el\">
\t\t\t<div id=\"int_res\">
\t\t\t\t";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_resultats", array(), "messages");
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["cerca"]) ? $context["cerca"] : $this->getContext($context, "cerca")), "html", null, true);
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_resultats_2", array(), "messages");
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["numresultats"]) ? $context["numresultats"] : $this->getContext($context, "numresultats")), "html", null, true);
        echo " ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_resultats_3", array(), "messages");
        // line 35
        echo "\t\t\t\t<table border=\"1\">
\t\t\t\t<tr>
\t\t\t\t<th>
\t\t\t\t";
        // line 38
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_titol", array(), "messages");
        // line 39
        echo "\t\t\t\t</th>
\t\t\t\t<th>
\t\t\t\t";
        // line 41
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_autor", array(), "messages");
        // line 42
        echo "\t\t\t\t</th>
\t\t\t\t<th>
\t\t\t\t";
        // line 44
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_editorial", array(), "messages");
        // line 45
        echo "\t\t\t\t</th>
\t\t\t\t<th>
\t\t\t\t";
        // line 47
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_preu", array(), "messages");
        // line 48
        echo "\t\t\t\t</th>
\t\t\t\t
\t\t\t\t</tr>
\t\t\t\t";
        // line 51
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 52
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 53
                echo "\t\t\t\t\t<tr class=\"text\">
\t\t\t\t\t\t<td class=\"sug_cell_rescerca c1\">";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td class=\"sug_cell_rescerca c2\">";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "autor"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td class=\"sug_cell_rescerca c3\">";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "editorial"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td class=\"sug_cell_rescerca c4\">";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "price"), "html", null, true);
                echo " &euro;</td>
\t\t\t\t\t\t<td class=\"sug_cell_rescerca c5\" onclick=\"demanaLlibre(";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "id"), "html", null, true);
                echo ")\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_demana", array(), "messages");
                echo "</td>
\t\t\t\t\t</tr>\t\t\t\t\t\t\t\t
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "\t\t\t\t</table>
\t\t\t\t
\t\t\t
\t    \t\t<div class=\"pagerfanta\" >
\t    \t\t\t";
            // line 65
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
\t    \t\t</div>
\t    \t\t</div>
\t\t\t\t</div>
\t\t    \t";
        } else {
            // line 70
            echo "\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t    \t";
        }
        // line 72
        echo "\t\t    \t<script>
\t\t    \t\$('li').removeClass('active');
\t\t    \t\$('#buscallibreli').addClass('active');
\t\t    \tvar path=\"";
        // line 75
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t    \tfunction demanaLlibre(id){
\t\t    \t\twindow.location.href=path+\"/llibreria22/demanaLlibre/\"+id;
\t\t    \t}
\t\t    \tfunction search(){
\t\t    \t\t
\t\t    \t\tvar val= document.getElementById(\"cercainput\").value;
\t\t\t\t\twindow.localStorage.setItem('cercar',val);
\t\t\t\t\twindow.location.href=path+\"/llibreria22/buscaLlibre/\"+val;
\t\t    \t}\t\t    \t\t\t
\t\t    \t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:BuscaLlibre.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 75,  187 => 72,  181 => 70,  173 => 65,  167 => 61,  156 => 58,  152 => 57,  148 => 56,  144 => 55,  140 => 54,  137 => 53,  132 => 52,  130 => 51,  125 => 48,  123 => 47,  119 => 45,  117 => 44,  113 => 42,  111 => 41,  107 => 39,  105 => 38,  100 => 35,  91 => 34,  82 => 28,  78 => 27,  69 => 21,  63 => 17,  61 => 16,  55 => 12,  53 => 11,  48 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
