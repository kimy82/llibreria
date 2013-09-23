<?php

/* AcmeStoreBundle:menu:index.html.twig */
class __TwigTemplate_e6d5cc0713d995d7d4a1af036b72f084 extends Twig_Template
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
        echo "\t<div class=\"content\">
\t<div class=\"tit\">
   \t\tLLIBRERIA 22 
\t\t</div>
\t</div>
\t<div id=\"content\">
   \t\t<div id=\"menu\">
\t\t<ul class=\"menu_admin\">
    \t<li><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("acme_llibre", array());
        echo "\" >Llibres</a></li>
    \t<li><a href=\"";
        // line 18
        echo $this->env->getExtension('routing')->getPath("acme_noticia", array());
        echo "\" >Noticies</a></li>
    \t<li><a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("acme_agenda", array());
        echo "\" >Agenda</a></li>
    \t<li ><a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("acme_suggerencia", array());
        echo "\" >Suggerencies</a></li>
    \t<li><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("acme_presentacio", array());
        echo "\" >Presentacio</a></li>
    \t<li><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("acme_galeria", array());
        echo "\" >Galeria</a></li>
    \t<li><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("acme_encarrecs", array());
        echo "\" >Encarrecs</a></li>
    \t<li><a href=\"";
        // line 24
        echo $this->env->getExtension('routing')->getPath("acme_pre_puja_txt", array());
        echo "\" >Upload</a></li>
\t\t<li ><a href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("acme_slider", array());
        echo "\" >Slider</a></li>
        </ul>
        </div>
        ";
        // line 28
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 29
            echo "           
        ";
        }
        // line 31
        echo "       </div>
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
        return array (  103 => 31,  99 => 29,  97 => 28,  91 => 25,  87 => 24,  83 => 23,  79 => 22,  75 => 21,  71 => 20,  67 => 19,  63 => 18,  59 => 17,  49 => 9,  47 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
