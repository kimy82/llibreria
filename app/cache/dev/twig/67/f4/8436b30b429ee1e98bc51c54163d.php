<?php

/* AcmeStoreBundle::layoutFrontend.html.twig */
class __TwigTemplate_67f48436b30b429ee1e98bc51c54163d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    <link rel=\"icon\" sizes=\"16x16\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/css/frontend.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/css/global.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/css/reset.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/css/coin-slider-styles.css"), "html", null, true);
        echo "\" />
    <script type=\"text/javascript\" src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/jquery.js"), "html", null, true);
        echo "\" ></script>
    <script type=\"text/javascript\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/global.js"), "html", null, true);
        echo "\" ></script>
    <script type=\"text/javascript\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/coin-slider.min.js"), "html", null, true);
        echo "\" ></script>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        echo "Llibreria22";
    }

    // line 15
    public function block_header($context, array $blocks = array())
    {
        // line 16
        echo "\t\t";
        $this->env->loadTemplate("AcmeStoreBundle:includes:top.html.twig")->display($context);
        echo "\t
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
    }

    // line 20
    public function block_footer($context, array $blocks = array())
    {
        // line 21
        echo "\t";
        $this->env->loadTemplate("AcmeStoreBundle:includes:footer.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle::layoutFrontend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  91 => 20,  86 => 18,  76 => 15,  70 => 14,  60 => 10,  56 => 9,  52 => 8,  44 => 6,  40 => 5,  35 => 4,  32 => 3,  175 => 46,  171 => 44,  169 => 43,  166 => 42,  162 => 40,  156 => 37,  152 => 35,  123 => 33,  119 => 32,  116 => 31,  114 => 30,  110 => 28,  106 => 26,  102 => 24,  88 => 22,  84 => 21,  81 => 20,  79 => 16,  75 => 17,  64 => 11,  57 => 13,  53 => 12,  48 => 7,  45 => 8,  42 => 7,  36 => 5,  30 => 3,);
    }
}
