<?php

/* AcmeStoreBundle:slider:SliderList.html.twig */
class __TwigTemplate_c9f4bdc1024b1aea4f6a5b127cc8b48f extends Twig_Template
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
        echo "MANAGE LIST  NOTICIA";
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
    <h1 class=\"title\">Noticia  ";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("noticia_list_page", array(), "messages");
        echo "</h1>
    \t<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("acme_store_homepage", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("menu_admin", array(), "messages");
        echo "</a>
    \t<a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("acme_pre_store_slider", array());
        echo "\" >";
        echo $this->env->getExtension('translator')->getTranslator()->trans("enter_slider", array(), "messages");
        echo "</a>
    \t";
        // line 13
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 14
            echo "    \t\t<ul>
    \t\t
    \t\t";
            // line 16
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["slider"]) {
                // line 17
                echo "    \t\t\t<li>  ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider")), "description"), "html", null, true);
                echo "   <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider")), "attachment"), "html", null, true);
                echo "\" /> \t<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edit_slider", array("id" => $this->getAttribute((isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider")), "id"))), "html", null, true);
                echo "\" >";
                echo $this->env->getExtension('translator')->getTranslator()->trans("edit_slider", array(), "messages");
                echo "</a> <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("delete_slider", array("id" => $this->getAttribute((isset($context["slider"]) ? $context["slider"] : $this->getContext($context, "slider")), "id"))), "html", null, true);
                echo "\" >";
                echo $this->env->getExtension('translator')->getTranslator()->trans("delete_slider", array(), "messages");
                echo "</a></li> 
    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
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
        echo "       <script>
function search(col,val){
\tvar path=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\twindow.localStorage.setItem('val_'+col,val);
\twindow.location.href=path+\"/admin/secured/noticia/noticia_llistat/n.\"+col+\" like ..\"+val+\".,\";
}
var titolval=window.localStorage.getItem('val_titol');
var subtitolval=window.localStorage.getItem('val_subtitol');
if(titolval!=null){
\tdocument.getElementById('titol').value=titolval;
}

if(subtitolval!=null){
\tdocument.getElementById('subtitol').value=subtitolval;
}
</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:slider:SliderList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 32,  120 => 30,  116 => 28,  114 => 27,  111 => 26,  107 => 24,  101 => 21,  97 => 19,  77 => 17,  73 => 16,  69 => 14,  67 => 13,  61 => 12,  55 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
