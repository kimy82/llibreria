<?php

/* AcmeStoreBundle:llibreria:Galeria.html.twig */
class __TwigTemplate_2aa184f07ce45a71951a9a493bda48b8 extends Twig_Template
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
        echo "\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/frontendGaleria.js"), "html", null, true);
        echo "\" ></script>
    ";
        // line 8
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 9
        echo "
    <h1 class=\"title\">";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_galeria_title", array(), "messages");
        echo "</h1>
    \t
    \t
    \t";
        // line 13
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 14
            echo "    \t\t<div class=\"menu_years_galeria\">
    \t\t<ul>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 0, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 0, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 1, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 1, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 2, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 2, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 3, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 3, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 4, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 4, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t</ul>
   \t\t\t</div>
   \t\t\t<div style=\"float:left;\">
   \t\t\t<ul>
    \t\t";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["galeria"]) {
                // line 26
                echo "    \t\t\t<script>
    \t\t\t\tgaleriaManagerObj.saveInfo(";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "id"), "html", null, true);
                echo ",\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "titol"), "html", null, true);
                echo "\",\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "subtitol"), "html", null, true);
                echo "\",\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "description"), "html", null, true);
                echo "\",\"";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "dataEntrada"), "Y-m-d"), "html", null, true);
                echo "\");    \t\t\t\t
    \t\t\t</script>
    \t\t\t<li id=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "id"), "html", null, true);
                echo "\"> <a href=\"#\" onclick=\"galeriaManagerObj.showFotoDesc(";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "id"), "html", null, true);
                echo ")\"> <img id=\"img_";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "id"), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["galeria"]) ? $context["galeria"] : $this->getContext($context, "galeria")), "attachment"), "html", null, true);
                echo "\" width=\"100px\" /></a> </li> 
    \t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['galeria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "    \t\t</ul>
    \t\t</div>
    \t\t<div class=\"pagerfanta\" >
    \t\t\t";
            // line 34
            echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            echo "
    \t\t</div>
    \t";
        } else {
            // line 37
            echo "    \t\t<div class=\"menu_years_galeria\">
    \t\t<ul>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 0, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 0, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 1, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 1, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 2, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 2, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 3, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 3, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t<li><a href=\"#\" onclick=\"searchFotosYear('";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 4, array(), "array"), "html", null, true);
            echo "')\" >";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")), 4, array(), "array"), "html", null, true);
            echo "</a></li>
   \t\t\t</ul>
   \t\t\t</div>
    \t \t<p>- There are no things </p>
    \t";
        }
        // line 48
        echo "    \t
        ";
        // line 49
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            // line 50
            echo "           DEV
        ";
        }
        // line 52
        echo "       <script>
\t\t    \$('li').removeClass('active');
\t\t    \$('#galeriali').addClass('active');
\t\t\tfunction searchFotosYear(year){
\t\t\t\tvar path=\"";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t\t\twindow.localStorage.setItem('year',year);
\t\t\t\twindow.location.href=path+\"/llibreria22/galeria/\"+year;
\t\t\t}
\t\t\tvar titolval=window.localStorage.getItem('val_titol');
\t\t\tvar subtitolval=window.localStorage.getItem('val_subtitol');
\t\t\tif(titolval!=null){
\t\t\t\tdocument.getElementById('titol').value=titolval;
\t\t\t}
\t\t\t
\t\t\tif(subtitolval!=null){
\t\t\t\tdocument.getElementById('subtitol').value=subtitolval;
\t\t\t}
\t\t
\t\t</script>
\t\t<!-- pagina per els dialogs -->

\t\t<div  id=\"divCargando\" class=\"divCargando\">
\t\t</div>
\t\t<div id=\"divCargandoImg\" class=\"divCargandoImg\">
\t\t  <a href=\"#\" onclick=\"inicio()\" >";
        // line 76
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_galeria_botton_cerrar", array(), "messages");
        echo "</a>
\t\t  <label id=\"titol_foto\" ></label>
\t\t  <label id=\"subtitol_foto\" ></label>
\t\t  <a href=\"#\" onclick=\"galeriaManagerObj.previous()\" ><</a>
\t\t  <img  id =\"img_id\" src=\"\" />
\t\t  <a href=\"#\" onclick=\"galeriaManagerObj.next()\" >></a>
\t\t  <label id=\"desc_foto\" ></label>
\t\t</div>
\t\t <script>
\t\t\tinicio();
\t\t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:Galeria.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 76,  200 => 56,  194 => 52,  190 => 50,  188 => 49,  185 => 48,  175 => 43,  169 => 42,  163 => 41,  157 => 40,  151 => 39,  147 => 37,  141 => 34,  136 => 31,  121 => 29,  108 => 27,  105 => 26,  101 => 25,  91 => 20,  85 => 19,  79 => 18,  73 => 17,  67 => 16,  63 => 14,  61 => 13,  55 => 10,  52 => 9,  50 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
