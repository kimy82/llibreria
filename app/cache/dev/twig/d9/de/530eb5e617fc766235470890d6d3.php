<?php

/* AcmeStoreBundle:upload:UploadOK.html.twig */
class __TwigTemplate_d9de530eb5e617fc766235470890d6d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeStoreBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeStoreBundle::layout.html.twig";
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
    <h1 class=\"title\">";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin_pujada", array(), "messages");
        echo "</h1>
    \t<div class=\"inline_menun_interior\" ><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a></div>
    \t
    \tLa pujada ha funcionat. Per un total de ";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["numtotal"]) ? $context["numtotal"] : $this->getContext($context, "numtotal")), "html", null, true);
        echo " s'ha fet ";
        echo twig_escape_filter($this->env, (isset($context["numfet"]) ? $context["numfet"] : $this->getContext($context, "numfet")), "html", null, true);
        echo " correctament.
    \t
        ";
        // line 15
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 16
            echo "           DEV
        ";
        }
        // line 18
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:upload:UploadOK.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 18,  71 => 16,  69 => 15,  62 => 13,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
