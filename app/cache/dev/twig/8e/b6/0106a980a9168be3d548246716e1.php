<?php

/* AcmeStoreBundle:llibreria:Searchs.html.twig */
class __TwigTemplate_8eb60106a980a9168be3d548246716e1 extends Twig_Template
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

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 9
        echo "
    <h1 class=\"title\"></h1>
    
    \t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "en", 1 => "fr", 2 => "es"));
        foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
            // line 13
            echo "\t\t    <li ";
            if (((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "locale"))) {
                echo "class=\"active\"";
            }
            echo ">
\t\t        <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route"), "method"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "get", array(0 => "_route_params"), "method"), array("_locale" => (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), "html", null, true);
            echo "</a>
\t\t    </li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "\t\t
    \t
    \t<div class=\"rightdiv\">
    \t\t
    \t   ";
        // line 21
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 22
            echo "\t    \t\t<ul>\t    \t\t\t
\t    \t\t";
            // line 23
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["search"]) {
                // line 24
                echo "\t    \t\t\t";
                if (($this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "category") == "llibre")) {
                    // line 25
                    echo "\t    \t\t\t\tLlibre
\t    \t\t\t";
                }
                // line 27
                echo "\t    \t\t\t";
                if (($this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "category") == "noticia")) {
                    // line 28
                    echo "\t    \t\t\t\tNoticia
\t    \t\t\t";
                }
                // line 30
                echo "\t    \t\t\t";
                if (($this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "category") == "presentacio")) {
                    // line 31
                    echo "\t    \t\t\t\tPresentacio
\t    \t\t\t";
                }
                // line 33
                echo "\t    \t\t\t<li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "titol"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "description"), "html", null, true);
                echo "  <img width=\"200px\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "path"), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["search"]) ? $context["search"] : $this->getContext($context, "search")), "attachment"), "html", null, true);
                echo "\" /></li> 
\t    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['search'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t    \t\t</ul>
\t    \t\t<div class=\"pagerfanta\" >
\t    \t\t\t";
            // line 37
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
\t    \t\t</div>
\t    \t";
        } else {
            // line 40
            echo "\t    \t <p>- There are no things </p>
\t    \t";
        }
        // line 42
        echo "    \t</div>
        ";
        // line 43
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 44
            echo "           DEV
        ";
        }
        // line 46
        echo "       <script>\t\t
\t\t\t\tdocument.getElementById(\"sesuatu\").value=window.localStorage.getItem('sesuatu');\t\t\t
\t\t\t\t
\t\t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Searchs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 46,  144 => 44,  142 => 43,  139 => 42,  135 => 40,  129 => 37,  125 => 35,  111 => 33,  107 => 31,  104 => 30,  100 => 28,  97 => 27,  93 => 25,  90 => 24,  86 => 23,  83 => 22,  81 => 21,  75 => 17,  64 => 14,  57 => 13,  53 => 12,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
