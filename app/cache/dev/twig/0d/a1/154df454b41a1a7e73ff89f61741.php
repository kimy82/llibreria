<?php

/* AcmeStoreBundle:encarrecs:EncarrecsList.html.twig */
class __TwigTemplate_0da1154df454b41a1a7e73ff89f61741 extends Twig_Template
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
        echo "\t
    <h1 class=\"title\">";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("list_book_page_title", array(), "messages");
        echo "</h1>
    \t<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a>
    \t
    \t";
        // line 13
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 14
            echo "    \t\t<ul>
    \t\t\t<li>Name: <input type=\"text\" value=\"\" id=\"name\" onblur=\"search(this.id,this.value)\" />&nbsp;
    \t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["encarrec"]) {
                // line 17
                echo "    \t\t\t<li>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "name"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "poblacio"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "codi"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "adreca"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "email"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "tel"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "llibre"), "name"), "html", null, true);
                echo " <a href=\"#\" onclick=\"deleteEncarrec(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "id"), "html", null, true);
                echo ")\">DELETE</a> <a href=\"#\" onclick=\"enviaEncarrec(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["encarrec"]) ? $context["encarrec"] : $this->getContext($context, "encarrec")), "id"), "html", null, true);
                echo ")\">ENVIAT</a></li> 
    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['encarrec'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    \t\t</ul>
    \t\t<div class=\"pagerfanta\" >
    \t\t\t";
            // line 21
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
    \t\t</div>
    \t";
        } else {
            // line 24
            echo "    \t <p>- There are no things </p>
    \t";
        }
        // line 26
        echo "    
        ";
        // line 27
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 28
            echo "           DEV
        ";
        }
        // line 30
        echo "        
              <script>
\t\t\t\tfunction deleteEncarrec(id){
\t\t\t\t\tvar path=\"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t\t\t\t
\t\t\t\t\twindow.location.href=path+\"/admin/secured/encarrec/delete/\"+id;
\t\t\t\t}
\t\t\t\t
\t\t\t\tfunction enviaEncarrec(id){
\t\t\t\t\tvar path=\"";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t\t\t\t
\t\t\t\t\twindow.location.href=path+\"/admin/secured/encarrec/envia/\"+id;
\t\t\t\t}\t\t\t\t\t\t\t
\t\t\t\t
\t\t\t</script>
       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:encarrecs:EncarrecsList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 39,  125 => 33,  120 => 30,  116 => 28,  114 => 27,  111 => 26,  107 => 24,  101 => 21,  97 => 19,  72 => 17,  68 => 16,  64 => 14,  62 => 13,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
