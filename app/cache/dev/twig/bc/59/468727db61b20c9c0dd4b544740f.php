<?php

/* AcmeStoreBundle:includes:top.html.twig */
class __TwigTemplate_bc59468727db61b20c9c0dd4b544740f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"sup\">
\t\t\t<div id=\"consup\">
\t\t\t\t<div id=\"logo\">
\t\t\t\t//logo
\t\t\t\t</div>
\t\t\t\t<div id=\"slider\">
\t\t\t\t\t<div id=\"coin-slider\" style=\"height: 100px;\">
\t\t\t\t\t\t";
        // line 8
        if ((twig_length_filter($this->env, (isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider"))) > 0)) {
            // line 9
            echo "\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider")));
            foreach ($context['_seq'] as $context["_key"] => $context["sld"]) {
                // line 10
                echo "\t\t\t\t\t\t\t\t<a href=\"#\" target=\"_blank\">
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t        \t<img src='";
                // line 12
                echo twig_escape_filter($this->env, (isset($context["pathSlider"]) ? $context["pathSlider"] : $this->getContext($context, "pathSlider")), "html", null, true);
                echo "slider/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sld"]) ? $context["sld"] : $this->getContext($context, "sld")), "attachment"), "html", null, true);
                echo "' />
\t\t\t\t\t\t\t        \t\t
\t\t\t\t\t\t\t       \t\t<span style=\"position: absolute; bottom: 0pt; left: 0pt; z-index: 1000; opacity: 0.7;\">
\t\t\t\t\t\t\t       \t\t\t";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["sld"]) ? $context["sld"] : $this->getContext($context, "sld")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t\t       \t\t</span>\t\t\t\t\t\t\t        \t\t\t \t\t
\t\t\t\t\t\t\t    </a>\t\t\t\t\t\t\t    \t\t\t\t\t\t\t  
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sld'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "\t\t\t\t\t\t";
        }
        echo "\t\t\t\t\t
\t\t\t\t    </div>\t\t\t\t  
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<!--endSup-->
\t\t<div id=\"menu\">
\t\t\t<div id=\"conmenu\">
\t\t\t\t<div id=\"menu_left\">
\t\t\t\t\t<ul class=\"me\">
\t\t\t\t\t<li id=\"bloqli\" ><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("acme_bloq", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_bloq_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"portadali\" class=\"active\"><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("acme_portada", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_portada_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"noticiali\" ><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("acme_noticias", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_noticia_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"presentacioli\" ><a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("acme_presentacions", array());
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_presentacio_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"suggerimentsli\"><a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("acme_suggeriments", array());
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriments_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"buscallibreli\"><a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("acme_busca_llibre", array("name" => "any"));
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"establimentsli\" ><a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("acme_establiments", array());
        echo "\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_establiments_menu", array(), "messages");
        echo "</a></li> | 
\t\t\t\t\t<li id=\"galeriali\" ><a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("acme_fotos_galeria", array("year" => "2013"));
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_galeria_menu", array(), "messages");
        echo "</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t\t<div id=\"menu_right\">
\t\t\t\t\t<div id=\"search_bar\">
\t\t\t\t\t\t<input class=\"inputs\" id=\"sesuatu\" type=\"text\">
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"b_search\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<script>
\t\t\t\$( \"#b_search\" ).click(function() {
\t\t\t\tvar path=\"";
        // line 50
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t\t\tvar sesuatu = document.getElementById(\"sesuatu\").value;
\t\t\t\twindow.localStorage.setItem('sesuatu',sesuatu);
\t\t\t
\t\t\t\twindow.location.href=path+\"/llibreria22/semuaSearch/\"+sesuatu;
  \t\t\t\t
\t\t\t});
\t\t\t
\t\t\t\$('#coin-slider').coinslider({ width: 630,height: 210});
\t\t</script>
\t\t<!--endmenu-->";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:includes:top.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 50,  113 => 36,  107 => 35,  101 => 34,  95 => 33,  89 => 32,  83 => 31,  77 => 30,  71 => 29,  47 => 15,  39 => 12,  28 => 8,  19 => 1,  94 => 21,  91 => 20,  86 => 18,  76 => 15,  70 => 14,  60 => 10,  56 => 9,  52 => 8,  44 => 6,  40 => 5,  35 => 10,  32 => 3,  175 => 46,  171 => 44,  169 => 43,  166 => 42,  162 => 40,  156 => 37,  152 => 35,  123 => 33,  119 => 32,  116 => 31,  114 => 30,  110 => 28,  106 => 26,  102 => 24,  88 => 22,  84 => 21,  81 => 20,  79 => 16,  75 => 17,  64 => 11,  57 => 19,  53 => 12,  48 => 7,  45 => 8,  42 => 7,  36 => 5,  30 => 9,);
    }
}
