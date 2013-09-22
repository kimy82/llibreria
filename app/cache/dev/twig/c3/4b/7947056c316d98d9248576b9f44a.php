<?php

/* AcmeStoreBundle:llibre:LlibreMain.html.twig */
class __TwigTemplate_c34b7947056c316d98d9248576b9f44a extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin_llibre", array(), "messages");
        echo "</h1>
    \t<div class=\"inline_menun_interior\" ><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a></div>
    \t<div class=\"inline_menun_interior\" ><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_pre_store_llibre", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("enter_llibre", array(), "messages");
        echo "</a></div>
    \t<div class=\"inline_menun_interior\" ><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("llistat_store_llibre", array("orderBy" => "1=1 order by n.id asc"));
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("llibre_list_page", array(), "messages");
        echo "</a></div>
    
    \t
        ";
        // line 16
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 17
            echo "           <br>
           DEV
        ";
        }
        // line 20
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibre:LlibreMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 20,  77 => 17,  75 => 16,  67 => 13,  61 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
