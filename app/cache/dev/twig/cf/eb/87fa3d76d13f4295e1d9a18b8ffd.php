<?php

/* TwigBundle::layout.html.twig */
class __TwigTemplate_cfeb87fa3d76d13f4295e1d9a18b8ffd extends Twig_Template
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
    <body id=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["body"]) ? $context["body"] : $this->getContext($context, "body")), "html", null, true);
        echo "\">
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
        return "TwigBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 16,  85 => 14,  82 => 13,  77 => 11,  72 => 7,  67 => 6,  58 => 16,  55 => 15,  53 => 13,  48 => 11,  38 => 7,  34 => 6,  29 => 4,  24 => 1,  57 => 12,  54 => 11,  43 => 9,  40 => 8,  33 => 4,  30 => 3,);
    }
}
