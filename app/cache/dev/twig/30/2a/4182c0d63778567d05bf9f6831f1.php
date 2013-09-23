<?php

/* AcmeStoreBundle:llibreria:LlibreriaMain.html.twig */
class __TwigTemplate_302a4182c0d63778567d05bf9f6831f1 extends Twig_Template
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
    \t<div class=\"leftdiv\">
    \t\t";
        // line 19
        if ((twig_length_filter($this->env, (isset($context["portada"]) ? $context["portada"] : $this->getContext($context, "portada"))) > 0)) {
            // line 20
            echo "\t    \t\t<ul>\t    \t\t\t
\t    \t\t";
            // line 21
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["portada"]) ? $context["portada"] : $this->getContext($context, "portada")));
            foreach ($context['_seq'] as $context["_key"] => $context["port"]) {
                // line 22
                echo "\t    \t\t\t<li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["port"]) ? $context["port"] : $this->getContext($context, "port")), "titol"), "html", null, true);
                echo " <img  width=\"300px\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["port"]) ? $context["port"] : $this->getContext($context, "port")), "tablePath"), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["port"]) ? $context["port"] : $this->getContext($context, "port")), "attachment"), "html", null, true);
                echo "\" /></li> 
\t    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['port'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "\t    \t\t</ul>
\t    \t";
        } else {
            // line 26
            echo "\t    \t <p>- There are no things </p>
\t    \t";
        }
        // line 28
        echo "    \t</div>
    \t<div class=\"rightdiv\">
    \t   ";
        // line 30
        if ((twig_length_filter($this->env, (isset($context["paginationPresentacio"]) ? $context["paginationPresentacio"] : $this->getContext($context, "paginationPresentacio"))) > 0)) {
            // line 31
            echo "\t    \t\t<ul>\t    \t\t\t
\t    \t\t";
            // line 32
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["paginationPresentacio"]) ? $context["paginationPresentacio"] : $this->getContext($context, "paginationPresentacio")));
            foreach ($context['_seq'] as $context["_key"] => $context["presentacio"]) {
                // line 33
                echo "\t    \t\t\t<li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "titol"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "subtitol"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "description"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "novetat"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "portada"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "intervindran"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "lloc"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "dataFi"), "Y-m-d"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "dataEntrada"), "Y-m-d"), "html", null, true);
                echo " <img width=\"200px\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo "presentacio/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "attachment"), "html", null, true);
                echo "\" /></li> 
\t    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presentacio'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t    \t\t</ul>
\t    \t\t<div class=\"pagerfanta\" >
\t    \t\t\t";
            // line 37
            echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationPresentacio"]) ? $context["paginationPresentacio"] : $this->getContext($context, "paginationPresentacio")));
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
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:LlibreriaMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 46,  171 => 44,  169 => 43,  166 => 42,  162 => 40,  156 => 37,  152 => 35,  123 => 33,  119 => 32,  116 => 31,  114 => 30,  110 => 28,  106 => 26,  102 => 24,  88 => 22,  84 => 21,  81 => 20,  79 => 19,  75 => 17,  64 => 14,  57 => 13,  53 => 12,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
