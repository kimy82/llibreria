<?php

/* AcmeStoreBundle:suggerencia:SuggerenciaForm.html.twig */
class __TwigTemplate_c290c57859dad9cb904161c18a531767 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("form_suggerencia", array(), "messages");
        echo "</h1>
    \t<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a>
    \t<a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_pre_store_suggerencia", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("new_sugg", array(), "messages");
        echo "</a>
    \t<a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("llistat_store_suggerencia", array("orderBy" => "1=1 order by n.id asc"));
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("list_sugg", array(), "messages");
        echo "</a>
    
    \t";
        // line 15
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo " 
    \t\t";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    \t\t\t<div class=\"form_date\"> ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date"), 'label', array("label" => "Data"));
        echo " 
    \t\t\t      ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date"), 'errors');
        echo " 
    \t\t\t      ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "date"), 'widget', array("attr" => array("class" => "form_date")));
        echo "
    \t\t\t</div>
    \t\t\t<div class=\"form_date\"> ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "attachment"), 'label', array("label" => "Foto"));
        echo " 
    \t\t\t      ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "attachment"), 'errors');
        echo " 
    \t\t\t      ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "attachment"), 'widget', array());
        echo "
    \t\t\t</div>
    \t";
        // line 25
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    \t
    \t";
        // line 27
        if (((isset($context["update"]) ? $context["update"] : $this->getContext($context, "update")) == 1)) {
            // line 28
            echo "    \t<script>
    \t  document.getElementById(\"form_attachment\").required=\"\";
    \t</script>
    \t";
        }
        // line 32
        echo "    \t
    \t
        ";
        // line 34
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 35
            echo "           DEV
        ";
        }
        // line 37
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:suggerencia:SuggerenciaForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 37,  127 => 35,  125 => 34,  121 => 32,  115 => 28,  113 => 27,  108 => 25,  103 => 23,  99 => 22,  95 => 21,  90 => 19,  86 => 18,  82 => 17,  78 => 16,  74 => 15,  67 => 13,  61 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
