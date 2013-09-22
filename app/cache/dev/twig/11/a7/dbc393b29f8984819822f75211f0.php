<?php

/* AcmeStoreBundle:agenda:AgendaForm.html.twig */
class __TwigTemplate_11a7dbc393b29f8984819822f75211f0 extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("form_agenda", array(), "messages");
        echo "</h1>
    \t<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a>
    \t<a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_pre_store_agenda", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("enter_agenda", array(), "messages");
        echo "</a>
    \t<a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("llistat_store_agenda", array("orderBy" => "1=1 order by n.id asc"));
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("agenda_list_page", array(), "messages");
        echo "</a>
    
    \t";
        // line 15
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form');
        echo "
    \t
    \t";
        // line 17
        if (((isset($context["update"]) ? $context["update"] : $this->getContext($context, "update")) == 1)) {
            // line 18
            echo "    \t<script>
    \t  document.getElementById(\"form_attachment\").required=\"\";
    \t</script>
    \t";
        }
        // line 22
        echo "    \t
        ";
        // line 23
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 24
            echo "           DEV
        ";
        }
        // line 26
        echo "       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:agenda:AgendaForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 26,  92 => 24,  90 => 23,  87 => 22,  81 => 18,  79 => 17,  74 => 15,  67 => 13,  61 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
