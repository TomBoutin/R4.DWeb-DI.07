<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /lego.html.twig */
class __TwigTemplate_31c07dfa8de4f885385d461034d999a2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/lego.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "/lego.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["legos"]) || array_key_exists("legos", $context) ? $context["legos"] : (function () { throw new RuntimeError('Variable "legos" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["lego"]) {
            // line 6
            echo "<div class=\"lego_card\">
      <div class=\"info_section\">
        <div class=\"lego_header\">
          <img class=\"locandina\" src=\"/images/";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "boxImage", [], "any", false, false, false, 9), "html", null, true);
            echo "\"/>
          <h1>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "name", [], "any", false, false, false, 10), "html", null, true);
            echo "</h1>
          <h4>Collection : ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "collection", [], "any", false, false, false, 11), "html", null, true);
            echo "</h4>
          <span class=\"pieces\">Pièces : ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "pieces", [], "any", false, false, false, 12), "html", null, true);
            echo "</span>
          <p class=\"price\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "price", [], "any", false, false, false, 13), "html", null, true);
            echo "€</p><br>
          <a href=\"index.php?buy=";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "id", [], "any", false, false, false, 14), "html", null, true);
            echo "\"><button>Buy</button></a>
        </div>
        <div class=\"lego_desc\">
          <p class=\"text\">
            ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "description", [], "any", false, false, false, 18), "html", null, true);
            echo "
        </p>
        </div>
        <div class=\"lego_social\">
          <ul>
            <li><i class=\"material-icons\">share</i></li>
            <li><i class=\"material-icons\"></i></li>
            <li><i class=\"material-icons\">chat_bubble</i></li>
          </ul>

        </div>

      </div>
      <div class=\"blur_back\">
        <img src=\"/images/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lego"], "legoImage", [], "any", false, false, false, 32), "html", null, true);
            echo "\" alt=\"background lego card\">
      </div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lego'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "/lego.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  122 => 36,  112 => 32,  95 => 18,  88 => 14,  84 => 13,  80 => 12,  76 => 11,  72 => 10,  68 => 9,  63 => 6,  59 => 5,  52 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}


{% block body %}
{% for lego in legos %}
<div class=\"lego_card\">
      <div class=\"info_section\">
        <div class=\"lego_header\">
          <img class=\"locandina\" src=\"/images/{{lego.boxImage}}\"/>
          <h1>{{lego.name}}</h1>
          <h4>Collection : {{lego.collection}}</h4>
          <span class=\"pieces\">Pièces : {{lego.pieces}}</span>
          <p class=\"price\">{{lego.price}}€</p><br>
          <a href=\"index.php?buy={{lego.id}}\"><button>Buy</button></a>
        </div>
        <div class=\"lego_desc\">
          <p class=\"text\">
            {{lego.description}}
        </p>
        </div>
        <div class=\"lego_social\">
          <ul>
            <li><i class=\"material-icons\">share</i></li>
            <li><i class=\"material-icons\"></i></li>
            <li><i class=\"material-icons\">chat_bubble</i></li>
          </ul>

        </div>

      </div>
      <div class=\"blur_back\">
        <img src=\"/images/{{lego.legoImage}}\" alt=\"background lego card\">
      </div>
</div>
{% endfor %}

{% endblock %}", "/lego.html.twig", "/var/www/html/templates/lego.html.twig");
    }
}
