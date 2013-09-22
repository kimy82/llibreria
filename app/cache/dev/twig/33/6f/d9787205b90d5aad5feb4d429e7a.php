<?php

/* AcmeStoreBundle:llibreria:Establiments.html.twig */
class __TwigTemplate_336fd9787205b90d5aad5feb4d429e7a extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_establiments_title", array(), "messages");
        // line 12
        echo "\t\t\t</div>
\t\t\t
\t\t\t
\t\t    \t<script>
\t\t    \t\t  \$('li').removeClass('active');
\t\t    \t\t  \$('#establimentsli').addClass('active');
\t\t    \t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Establiments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 12,  53 => 11,  48 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
