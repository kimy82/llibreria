<?php

/* AcmeStoreBundle:llibreria:Presentacio.html.twig */
class __TwigTemplate_55746c7d93734f08179176e212edeaed extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_presentacio_title", array(), "messages");
        // line 12
        echo "\t\t\t</div>
\t\t\t
\t\t\t";
        // line 14
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 15
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["presentacio"]) {
                // line 16
                echo "\t\t\t\t\t<div class=\"not_el\">
\t\t\t\t\t<div class=\"not_int\">
\t\t\t\t\t\t<span class=\"tit_not\">
\t\t\t\t\t\t\t";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "titol"), "html", null, true);
                echo "
\t\t\t\t\t\t</span><br>
\t\t\t\t\t\t<span class=\"sub_tit\">
\t\t\t\t\t\t\t";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "subtitol"), "html", null, true);
                echo "
\t\t\t\t\t\t</span><br>
\t\t\t\t\t\t<p>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "description"), "html", null, true);
                echo " \t</p>
\t\t\t\t\t\t<p><img id=\"img_";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "id"), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" /></p>
\t\t\t\t\t\t<div class=\"not_fet\">
\t\t\t\t\t\t\t";
                // line 27
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_publicat_el", array(), "messages");
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["presentacio"]) ? $context["presentacio"] : $this->getContext($context, "presentacio")), "dataEntrada"), "Y F jS"), "html", null, true);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['presentacio'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "\t\t\t\t
\t    \t\t<div class=\"pagerfanta\" >
\t    \t\t\t";
            // line 35
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
\t    \t\t</div>
\t\t    \t";
        } else {
            // line 38
            echo "\t\t    \t\t <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("f_no_things", array(), "messages");
            echo "</p>
\t\t    \t";
        }
        // line 40
        echo "\t\t    \t<script>
\t\t    \t\t  \$('li').removeClass('active');
\t\t    \t\t  \$('#presentacioli').addClass('active');
\t\t    \t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Presentacio.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 40,  117 => 38,  111 => 35,  107 => 33,  94 => 27,  86 => 25,  82 => 24,  77 => 22,  71 => 19,  66 => 16,  61 => 15,  59 => 14,  55 => 12,  53 => 11,  48 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
