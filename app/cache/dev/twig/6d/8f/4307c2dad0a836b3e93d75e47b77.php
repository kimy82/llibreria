<?php

/* AcmeStoreBundle::layout.html.twig */
class __TwigTemplate_6d8f4307c2dad0a836b3e93d75e47b77 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("TwigBundle::layoutBackend.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layoutBackend.html.twig";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/css/admin.css"), "html", null, true);
        echo "\" />
    <script type=\"text/javascript\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/jquery.js"), "html", null, true);
        echo "\" ></script>
    <script type=\"text/javascript\" src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmestore/js/global.js"), "html", null, true);
        echo "\" ></script>
";
    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "        <div class=\"flash-message\">
            <em>Notice</em>: ";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "
    ";
        // line 20
        $this->displayBlock('content_header', $context, $blocks);
        // line 29
        echo "
    <div class=\"block\">
        ";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "    </div>

    ";
        // line 34
        if (array_key_exists("code", $context)) {
            // line 35
            echo "        <h2>Code behind this page</h2>
        <div class=\"block\">
            <div class=\"symfony-content\">";
            // line 37
            echo (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"));
            echo "</div>
        </div>
    ";
        }
    }

    // line 20
    public function block_content_header($context, array $blocks = array())
    {
        // line 21
        echo "        <ul id=\"menu\">
            ";
        // line 22
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 25
        echo "        </ul>

        <div style=\"clear: both\"></div>
    ";
    }

    // line 22
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 23
        echo "                <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("_demo");
        echo "\">Demo Home</a></li>
            ";
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AcmeStoreBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 31,  132 => 23,  129 => 22,  122 => 25,  120 => 22,  117 => 21,  114 => 20,  106 => 37,  102 => 35,  100 => 34,  96 => 32,  94 => 31,  90 => 29,  88 => 20,  85 => 19,  73 => 15,  68 => 14,  65 => 13,  59 => 11,  53 => 8,  45 => 6,  41 => 5,  33 => 3,  80 => 20,  76 => 16,  74 => 17,  70 => 16,  66 => 15,  62 => 14,  58 => 13,  54 => 12,  49 => 7,  47 => 8,  42 => 7,  36 => 4,  30 => 3,);
    }
}
