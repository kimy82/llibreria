<?php

/* AcmeStoreBundle:menu:index.html.twig */
class __TwigTemplate_59eae0be468eb5dadac3ffb22fcb28b9 extends Twig_Template
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
        echo "MENU";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        echo "\t
    ";
        // line 8
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 9
        echo "
    <h1 class=\"title\">Llibreria Menu Admin page</h1>
    
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_llibre", array());
        echo "\" >Llibres</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("acme_noticia", array());
        echo "\" >Noticies</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("acme_agenda", array());
        echo "\" >Agenda</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("acme_presentacio", array());
        echo "\" >Presentacio</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("acme_galeria", array());
        echo "\" >Galeria</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("acme_encarrecs", array());
        echo "\" >Encarrecs</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("acme_pre_puja_txt", array());
        echo "\" >Upload</a></div>
    \t<div class=\"inline_menu\" ><a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("acme_slider", array());
        echo "\" >Slider</a></div>
        ";
        // line 20
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 21
            echo "           DEV
        ";
        }
        // line 23
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:menu:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 23,  88 => 21,  86 => 20,  82 => 19,  78 => 18,  74 => 17,  70 => 16,  66 => 15,  62 => 14,  58 => 13,  54 => 12,  49 => 9,  47 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
