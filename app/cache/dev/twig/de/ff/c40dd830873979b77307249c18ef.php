<?php

/* TwigBundle::layoutBackend.html.twig */
class __TwigTemplate_deffc40dd830873979b77307249c18ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\"/>
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 8
        echo "    </head>
    <body>
    \t<div id=\"container\">
    \t\t";
        // line 11
        $this->displayBlock('header', $context, $blocks);
        echo "    \t\t\t
\t\t\t<div id=\"cont_cont\">
\t\t    \t";
        // line 13
        $this->displayBlock('content', $context, $blocks);
        // line 15
        echo "\t\t     </div>
\t\t     ";
        // line 16
        $this->displayBlock('footer', $context, $blocks);
        echo "\t\t     \t
\t\t </div>
    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
    }

    // line 11
    public function block_header($context, array $blocks = array())
    {
    }

    // line 13
    public function block_content($context, array $blocks = array())
    {
        // line 14
        echo "\t\t\t\t";
    }

    // line 16
    public function block_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "TwigBundle::layoutBackend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 16,  82 => 14,  74 => 11,  69 => 7,  64 => 6,  55 => 16,  52 => 15,  50 => 13,  40 => 8,  38 => 7,  34 => 6,  29 => 4,  24 => 1,  139 => 31,  132 => 23,  129 => 22,  122 => 25,  120 => 22,  117 => 21,  114 => 20,  106 => 37,  102 => 35,  100 => 34,  96 => 32,  94 => 31,  90 => 29,  88 => 20,  85 => 19,  76 => 16,  73 => 15,  68 => 14,  65 => 13,  53 => 8,  45 => 11,  41 => 5,  33 => 3,  103 => 31,  99 => 29,  97 => 28,  91 => 25,  87 => 24,  83 => 23,  79 => 13,  75 => 21,  71 => 20,  67 => 19,  63 => 18,  59 => 11,  49 => 7,  47 => 8,  42 => 7,  36 => 4,  30 => 3,);
    }
}
