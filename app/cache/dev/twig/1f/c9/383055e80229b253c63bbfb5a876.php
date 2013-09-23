<?php

/* AcmeStoreBundle:llibreria:Suggeriments.html.twig */
class __TwigTemplate_1fc9383055e80229b253c63bbfb5a876 extends Twig_Template
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
\t\t\t<div class=\"tit_fixS\">
\t\t\t\t";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_title", array(), "messages");
        echo "<br>
\t\t\t\t<span class=\"sub_sug\">";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_desc", array(), "messages");
        echo "\t</span>
\t\t\t</div>
\t\t\t<section class=\"tabs\">
\t            <input id=\"tab-1\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-1 opts\" checked=\"checked\" />
\t\t        <label for=\"tab-1\" class=\"tab-label-1 labe\">";
        // line 16
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_llibre", array(), "messages");
        echo "</label>\t\t
\t            <input id=\"tab-2\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-2 opts\" />
\t\t        <label for=\"tab-2\" class=\"tab-label-2 labe\">";
        // line 18
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_butxaca", array(), "messages");
        echo "</label>\t\t
\t            <input id=\"tab-3\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-3 opts\" />
\t\t        <label for=\"tab-3\" class=\"tab-label-3 labe\">";
        // line 20
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_comic", array(), "messages");
        echo "</label>
\t\t         <input id=\"tab-4\" type=\"radio\" name=\"radio-set\" class=\"tab-selector-4 opts\" />
\t\t        <label for=\"tab-4\" class=\"tab-label-4 labe\">";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_suggeriment_infantil", array(), "messages");
        echo "</label>\t\t
\t\t\t    <div class=\"clear-shadow\"></div>\t\t\t\t
\t\t        <div class=\"contente\">
\t\t\t         <div class=\"contente-1\">
\t\t\t\t\t\t<div class=\"not_el\">
\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
        // line 28
        if ((twig_length_filter($this->env, (isset($context["paginationllibre"]) ? $context["paginationllibre"] : $this->getContext($context, "paginationllibre"))) > 0)) {
            // line 29
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationllibre"]) ? $context["paginationllibre"] : $this->getContext($context, "paginationllibre")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 30
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"total\">
\t\t\t\t\t\t\t\t\t\t<img  src=\"";
                // line 31
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"titol\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"texte\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t    \t";
        } else {
            // line 44
            echo "\t\t\t\t\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t\t\t\t\t    \t";
        }
        // line 46
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t\t </div>
\t\t\t        <div class=\"contente-2\">
\t\t\t\t\t\t<div class=\"not_el\">
\t\t\t\t\t\t\t\t";
        // line 52
        if ((twig_length_filter($this->env, (isset($context["paginationbutxaca"]) ? $context["paginationbutxaca"] : $this->getContext($context, "paginationbutxaca"))) > 0)) {
            // line 53
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationbutxaca"]) ? $context["paginationbutxaca"] : $this->getContext($context, "paginationbutxaca")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 54
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"total\">
\t\t\t\t\t\t\t\t\t\t<img  src=\"";
                // line 55
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"titol\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"texte\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t    \t";
        } else {
            // line 68
            echo "\t\t\t\t\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t\t\t\t\t    \t";
        }
        // line 70
        echo "\t\t\t\t\t\t</div>                
                    </div>
\t\t\t        <div class=\"contente-3\">
\t\t\t\t\t\t<div class=\"not_el\">
\t\t\t\t\t\t\t\t";
        // line 74
        if ((twig_length_filter($this->env, (isset($context["paginationcomic"]) ? $context["paginationcomic"] : $this->getContext($context, "paginationcomic"))) > 0)) {
            // line 75
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationcomic"]) ? $context["paginationcomic"] : $this->getContext($context, "paginationcomic")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 76
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"total\">
\t\t\t\t\t\t\t\t\t\t<img  src=\"";
                // line 77
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"titol\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"texte\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 83
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t    \t";
        } else {
            // line 90
            echo "\t\t\t\t\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t\t\t\t\t    \t";
        }
        // line 92
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>   
\t\t\t\t\t<div class=\"contente-4\">
\t\t\t\t\t\t<div class=\"not_el\">
\t\t\t\t\t\t\t\t";
        // line 96
        if ((twig_length_filter($this->env, (isset($context["paginationinfantil"]) ? $context["paginationinfantil"] : $this->getContext($context, "paginationinfantil"))) > 0)) {
            // line 97
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationinfantil"]) ? $context["paginationinfantil"] : $this->getContext($context, "paginationinfantil")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 98
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"total\">
\t\t\t\t\t\t\t\t\t\t<img  src=\"";
                // line 99
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"titol\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 102
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"texte\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 105
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "description"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t    \t";
        } else {
            // line 112
            echo "\t\t\t\t\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t\t\t\t\t    \t";
        }
        // line 114
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>                             
                        </div>
\t\t        </div>
</section>
 </div>
 <script>
\t\t    \t\t  \$('li').removeClass('active');
\t\t    \t\t  \$('#suggerimentsli').addClass('active');
</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Suggeriments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 114,  278 => 112,  274 => 110,  263 => 105,  257 => 102,  250 => 99,  247 => 98,  242 => 97,  240 => 96,  234 => 92,  228 => 90,  224 => 88,  213 => 83,  207 => 80,  200 => 77,  197 => 76,  192 => 75,  190 => 74,  184 => 70,  178 => 68,  174 => 66,  163 => 61,  157 => 58,  150 => 55,  147 => 54,  142 => 53,  140 => 52,  132 => 46,  126 => 44,  122 => 42,  111 => 37,  105 => 34,  98 => 31,  95 => 30,  90 => 29,  88 => 28,  79 => 22,  74 => 20,  69 => 18,  64 => 16,  57 => 12,  53 => 11,  48 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
