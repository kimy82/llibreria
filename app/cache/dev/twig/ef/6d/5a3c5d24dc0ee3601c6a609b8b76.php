<?php

/* AcmeStoreBundle:llibreria:DemanaLlibre.html.twig */
class __TwigTemplate_ef6d5a3c5d24dc0ee3601c6a609b8b76 extends Twig_Template
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
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 8
        echo "
\t\t<div class=\"contentnot\">
\t\t\t<div class=\"tit_fixN\">
\t\t\t\t";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_demana_llibre_title", array(), "messages");
        // line 12
        echo "\t\t\t</div>
\t\t\t
\t\t\t<div class=\"res_el\">
\t\t\t\t<div class=\"recer_int\">
\t\t\t\t";
        // line 16
        if ((twig_length_filter($this->env, (isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination"))) > 0)) {
            // line 17
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
            foreach ($context['_seq'] as $context["_key"] => $context["llibre"]) {
                // line 18
                echo "\t\t\t\t\t";
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_llibre_demanat", array(), "messages");
                echo "<br>
\t\t\t\t\t<ul>
\t\t\t\t\t\t<li>";
                // line 20
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_titol", array(), "messages");
                echo "   <br>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "name"), "html", null, true);
                echo "</li>
\t\t\t\t\t\t<li>";
                // line 21
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_autor", array(), "messages");
                echo "   <br>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "autor"), "html", null, true);
                echo "</li>
\t\t\t\t\t\t<li>";
                // line 22
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_editorial", array(), "messages");
                echo "   <br>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "editorial"), "html", null, true);
                echo "</li>
\t\t\t\t\t\t<li>";
                // line 23
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_preu", array(), "messages");
                echo "   <br>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["llibre"]) ? $context["llibre"] : $this->getContext($context, "llibre")), "price"), "html", null, true);
                echo " &euro;</li>
\t\t\t\t\t\t<li>";
                // line 24
                echo $this->env->getExtension('translator')->getTranslator()->trans("f_demana_llibre_preu_desc", array(), "messages");
                echo "</li>
\t\t\t\t\t</ul>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['llibre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "\t\t\t\t";
        }
        // line 28
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"pres_el_res\">
\t\t\t\t<div class=\"recer_int\">
\t\t\t\t";
        // line 32
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_mots_acerca", array(), "messages");
        echo "<br>
\t\t\t\t<div id=\"search_bar\">
\t\t\t\t\t<input class=\"inputs_cer\" id=\"cercainput\" type=\"text\">
\t\t\t\t</div>
\t\t\t\t\t<div id=\"b_search\" onclick=\"search()\">
\t\t\t\t</div>
\t\t\t\t<span class=\"ce\">";
        // line 38
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_clic", array(), "messages");
        echo "</span>
\t\t\t\t<div>
\t\t\t\t";
        // line 40
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo " 
    \t\t\t\t";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
\t\t    \t\t\t<div> ";
        // line 42
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_nom_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div> ";
        // line 46
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_poble_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "poblacio"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "poblacio"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "poblacio"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div> ";
        // line 50
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_adreca_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "adreca"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "adreca"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 52
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "adreca"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div> ";
        // line 54
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_codipostal_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codi"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codi"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "codi"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div> ";
        // line 58
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_email_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div> ";
        // line 62
        echo $this->env->getExtension('translator')->getTranslator()->trans("f_busca_llibre_tel_client", array(), "messages");
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 64
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "tel"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
\t\t    \t\t\t<div style=\"visibility: hidden;\"> ";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "llibre"), 'label', array("label" => " "));
        echo " 
\t\t    \t\t\t      ";
        // line 67
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "llibre"), 'errors');
        echo " 
\t\t    \t\t\t      ";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "llibre"), 'widget', array());
        echo "
\t\t    \t\t\t</div>
    \t\t\t";
        // line 70
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    \t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t    \t<script>
\t\t    \t\$('li').removeClass('active');
\t\t    \t\$('#buscallibreli').addClass('active');
\t\t    \tfunction demanaLlibre(id){
\t\t    \t\twindow.location.href=path+\"/llibreria22/demanaLlibre/\"+id;
\t\t    \t}
\t\t    \tfunction search(){
\t\t    \t\tvar path=\"";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["pathlocal"]) ? $context["pathlocal"] : $this->getContext($context, "pathlocal")), "html", null, true);
        echo "\";
\t\t    \t\tvar val= document.getElementById(\"cercainput\").value;
\t\t\t\t\twindow.localStorage.setItem('cercar',val);
\t\t\t\t\twindow.location.href=path+\"/llibreria22/buscaLlibre/\"+val;
\t\t    \t}\t\t    \t\t\t
\t\t    \t</script>
";
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle:llibreria:DemanaLlibre.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 81,  235 => 70,  230 => 68,  226 => 67,  222 => 66,  217 => 64,  213 => 63,  208 => 62,  203 => 60,  199 => 59,  194 => 58,  189 => 56,  185 => 55,  180 => 54,  175 => 52,  171 => 51,  166 => 50,  161 => 48,  157 => 47,  152 => 46,  147 => 44,  143 => 43,  138 => 42,  134 => 41,  130 => 40,  125 => 38,  116 => 32,  110 => 28,  107 => 27,  98 => 24,  92 => 23,  86 => 22,  80 => 21,  74 => 20,  68 => 18,  63 => 17,  61 => 16,  55 => 12,  53 => 11,  48 => 8,  45 => 7,  42 => 6,  36 => 5,  30 => 3,);
    }
}
