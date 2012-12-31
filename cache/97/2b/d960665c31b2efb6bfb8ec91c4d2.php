<?php

/* index.html */
class __TwigTemplate_972bd960665c31b2efb6bfb8ec91c4d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
  <title>Untitled</title>
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/style/css/reset.min.css\">
  
  
  <script type=\"text/javascript\" src=\"/style/js/jquery-1.8.3.min.js\"></script>
  
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/woothemes/flexslider.css\">
  <script type=\"text/javascript\" src=\"/woothemes/jquery.flexslider.js\"></script>
  
  <script type=\"text/javascript\">
    \$(document).ready(function() {
      \$('.flexslider').flexslider({
        animation: 'slide',
        itemWidth: 607,
        itemHeight: 500,
      });
    })
  </script>
  
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/style/css/styles.css\">
</head>
<body>
  <div style=\"height: 500px; background: red;\">
  
  ";
        // line 29
        $this->env->loadTemplate("base/slider.html")->display($context);
        // line 30
        echo "  
  </div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 30,  49 => 29,  19 => 1,);
    }
}
