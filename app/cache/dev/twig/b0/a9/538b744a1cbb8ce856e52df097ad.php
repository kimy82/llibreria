<?php

/* AcmeStoreBundle:llibreria:Portada.html.twig */
class __TwigTemplate_b0a9538b744a1cbb8ce856e52df097ad extends Twig_Template
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
    
    \t
    \t<div class=\"leftdiv\">
    \t\t";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["portada"]) ? $context["portada"] : $this->getContext($context, "portada"))) > 0)) {
            // line 15
            echo "\t    \t\t<ul>\t    \t\t\t
\t    \t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["portada"]) ? $context["portada"] : $this->getContext($context, "portada")));
            foreach ($context['_seq'] as $context["_key"] => $context["port"]) {
                // line 17
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
            // line 19
            echo "\t    \t\t</ul>
\t    \t";
        } else {
            // line 21
            echo "\t    \t <p>- There are no things </p>
\t    \t";
        }
        // line 23
        echo "    \t</div>
        ";
        // line 24
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 25
            echo "           DEV
        ";
        }
        // line 27
        echo "       <script>
       \t\t\t\$('li').removeClass('active');
\t\t    \t\$('#portadali').addClass('active');
       </script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Portada.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 27,  91 => 25,  89 => 24,  86 => 23,  82 => 21,  78 => 19,  64 => 17,  60 => 16,  57 => 15,  55 => 14,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
