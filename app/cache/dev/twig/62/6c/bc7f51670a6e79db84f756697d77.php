<?php

/* AcmeStoreBundle:llibre:LlibreList.html.twig */
class __TwigTemplate_626cbc7f51670a6e79db84f756697d77 extends Twig_Template
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
    \t<a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_pre_store_llibre", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("new_book", array(), "messages");
        echo "</a>
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
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 17
                echo "    \t\t\t<li>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "dateEntrada"), "Y-m-d"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "description"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "price"), "html", null, true);
                echo "
    \t\t\t ";
                // line 18
                if (($this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "suggerir") == 0)) {
                    // line 19
                    echo "           \t\t\tNO
        \t\t ";
                } else {
                    // line 21
                    echo "        \t\t \tSI
        \t\t ";
                }
                // line 23
                echo "    \t\t\t  <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "attachment"), "html", null, true);
                echo "\" /> \t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_llibre", array("id" => $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "id"))), "html", null, true);
                echo "\" >";
                echo $this->env->getExtension('translator')->getTranslator()->trans("edit_book", array(), "messages");
                echo "</a> <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("delete_llibre", array("id" => $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "id"))), "html", null, true);
                echo "\" >";
                echo $this->env->getExtension('translator')->getTranslator()->trans("delete_book", array(), "messages");
                echo "</a></li> 
    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    \t\t</ul>
    \t\t<div class=\"pagerfanta\" >
    \t\t\t";
            // line 27
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
    \t\t</div>
    \t";
        } else {
            // line 30
            echo "    \t <p>- There are no things </p>
    \t";
        }
        // line 32
        echo "    
        ";
        // line 33
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 34
            echo "           DEV
        ";
        }
        // line 36
        echo "        
              <script>
\t\t\t\tfunction search(col,val){
\t\t\t\t\tvar path=\"";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t\t\t\twindow.localStorage.setItem('val_llib_'+col,val);
\t\t\t\t\twindow.location.href=path+\"/admin/secured/llibre/llibre_llistat/n.\"+col+\" like ..\"+val+\".,\";
\t\t\t\t}
\t\t\t\tvar nameval=window.localStorage.getItem('val_llib_name');
\t\t\t\t
\t\t\t\tif(nameval!=null){
\t\t\t\t\tdocument.getElementById('name').value=nameval;
\t\t\t\t}
\t\t\t\t
\t\t\t\t
\t\t\t</script>
       
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibre:LlibreList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 39,  139 => 36,  135 => 34,  133 => 33,  130 => 32,  126 => 30,  120 => 27,  116 => 25,  98 => 23,  94 => 21,  90 => 19,  88 => 18,  77 => 17,  73 => 16,  69 => 14,  67 => 13,  61 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
