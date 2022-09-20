<?php

/* essence/template/account/newslist.twig */
class __TwigTemplate_d0a7604264ec4836ce078d5991d597bfa2faa697e37cf253fc38a035518be013 extends Twig_Template
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
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
<div id=\"account-wishlist\" class=\"container-fluid\">
  <ul class=\"breadcrumb\">
     ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) ? $context["breadcrumbs"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "          ";
            if ($this->getAttribute($context["loop"], "last", array())) {
                // line 6
                echo "            <li class=\"breadcrumb-item\" aria-current=\"page\"><span class=\"link active\" >";
                echo $this->getAttribute($context["breadcrumb"], "text", array());
                echo "</span></li>
          ";
            } elseif (($this->getAttribute(            // line 7
$context["loop"], "revindex0", array()) == 1)) {
                // line 8
                echo "            <li class=\"breadcrumb-item\" data-prev><a href=\"";
                echo $this->getAttribute($context["breadcrumb"], "href", array());
                echo "\" class=\"link\"><span>";
                echo $this->getAttribute($context["breadcrumb"], "text", array());
                echo "</span></a></li>
          ";
            } else {
                // line 10
                echo "            <li class=\"breadcrumb-item\"><a href=\"";
                echo $this->getAttribute($context["breadcrumb"], "href", array());
                echo "\" class=\"link\"><span>";
                echo $this->getAttribute($context["breadcrumb"], "text", array());
                echo "</span></a></li>
          ";
            }
            // line 12
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "  </ul>
  ";
        // line 14
        if ((isset($context["success"]) ? $context["success"] : null)) {
            // line 15
            echo "  <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo (isset($context["success"]) ? $context["success"] : null);
            echo "
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
  </div>
  ";
        }
        // line 19
        echo "  <div class=\"row\">";
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 20
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 21
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 22
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 23
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 24
            echo "    ";
        } else {
            // line 25
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 26
            echo "    ";
        }
        // line 27
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <h2>";
        // line 28
        echo (isset($context["heading_title"]) ? $context["heading_title"] : null);
        echo "</h2>
      <div class=\"buttons clearfix\">
        <div class=\"pull-right\">
          <a href=\"";
        // line 31
        echo (isset($context["continue"]) ? $context["continue"] : null);
        echo "\" class=\"btn btn-primary\">Add News</a>
        </div>
      </div>
      ";
        // line 34
        if ((isset($context["news"]) ? $context["news"] : null)) {
            // line 35
            echo "      <div class=\"table-responsive\">
        <table class=\"table table-bordered table-hover\">
          <thead>
            <tr>
              <td class=\"text-center\">";
            // line 39
            echo (isset($context["column_image"]) ? $context["column_image"] : null);
            echo "</td>
              <td class=\"text-left\">";
            // line 40
            echo (isset($context["column_name"]) ? $context["column_name"] : null);
            echo "</td>
              <td class=\"text-left\">";
            // line 41
            echo (isset($context["column_short"]) ? $context["column_short"] : null);
            echo "</td>
              <td class=\"text-left\">";
            // line 42
            echo (isset($context["column_desc"]) ? $context["column_desc"] : null);
            echo "</td>
              <td class=\"text-left\">";
            // line 43
            echo (isset($context["column_date"]) ? $context["column_date"] : null);
            echo "</td>
              <td class=\"text-right\">";
            // line 44
            echo (isset($context["column_action"]) ? $context["column_action"] : null);
            echo "</td>
            </tr>
          </thead>
          <tbody>
          
          ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["news"]) ? $context["news"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["new"]) {
                // line 50
                echo "          <tr>
            <td class=\"text-center\">
              ";
                // line 52
                if ($this->getAttribute($context["new"], "thumb", array())) {
                    // line 53
                    echo "              <a>
                <img src=\"";
                    // line 54
                    echo $this->getAttribute($context["new"], "thumb", array());
                    echo "\" alt=\"";
                    echo $this->getAttribute($context["new"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["new"], "name", array());
                    echo "\" />
                </a>
              ";
                }
                // line 57
                echo "            </td>
            <td class=\"text-left\">";
                // line 58
                echo $this->getAttribute($context["new"], "name", array());
                echo "</td>
            <td class=\"text-left\">";
                // line 59
                echo $this->getAttribute($context["new"], "short_name", array());
                echo "</td>
            <td class=\"text-left\">";
                // line 60
                echo $this->getAttribute($context["new"], "description", array());
                echo "</td>
            <td class=\"text-left\">";
                // line 61
                echo $this->getAttribute($context["new"], "date_added", array());
                echo "</td>
            <td class=\"text-right\">
              <a href=\"";
                // line 63
                echo $this->getAttribute($context["new"], "edit", array());
                echo "\" data-toggle=\"tooltip\" title=\"Edit\" class=\"btn btn-info\">Edit</a>
              <a href=\"";
                // line 64
                echo $this->getAttribute($context["new"], "delete", array());
                echo "\" data-toggle=\"tooltip\" title=\"Delete\" class=\"btn btn-danger\">Delete</a>
            </td>
          </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['new'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "            </tbody>
          
        </table>
      </div>
        <div class=\"row\">
          <div class=\"col-sm-6 text-left\">";
            // line 73
            echo (isset($context["pagination"]) ? $context["pagination"] : null);
            echo "</div>
          <div class=\"col-sm-6 text-right\">";
            // line 74
            echo (isset($context["results"]) ? $context["results"] : null);
            echo "</div>
        </div>
      ";
        } else {
            // line 77
            echo "      <p>";
            echo (isset($context["text_empty"]) ? $context["text_empty"] : null);
            echo "</p>
      ";
        }
        // line 79
        echo "      ";
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 80
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
";
        // line 82
        echo (isset($context["footer"]) ? $context["footer"] : null);
    }

    public function getTemplateName()
    {
        return "essence/template/account/newslist.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 82,  260 => 80,  255 => 79,  249 => 77,  243 => 74,  239 => 73,  232 => 68,  222 => 64,  218 => 63,  213 => 61,  209 => 60,  205 => 59,  201 => 58,  198 => 57,  188 => 54,  185 => 53,  183 => 52,  179 => 50,  175 => 49,  167 => 44,  163 => 43,  159 => 42,  155 => 41,  151 => 40,  147 => 39,  141 => 35,  139 => 34,  133 => 31,  127 => 28,  120 => 27,  117 => 26,  114 => 25,  111 => 24,  108 => 23,  105 => 22,  102 => 21,  100 => 20,  95 => 19,  87 => 15,  85 => 14,  82 => 13,  68 => 12,  60 => 10,  52 => 8,  50 => 7,  45 => 6,  42 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="account-wishlist" class="container-fluid">*/
/*   <ul class="breadcrumb">*/
/*      {% for breadcrumb in breadcrumbs %}*/
/*           {% if loop.last %}*/
/*             <li class="breadcrumb-item" aria-current="page"><span class="link active" >{{ breadcrumb.text }}</span></li>*/
/*           {% elseif loop.revindex0 == 1 %}*/
/*             <li class="breadcrumb-item" data-prev><a href="{{ breadcrumb.href }}" class="link"><span>{{ breadcrumb.text }}</span></a></li>*/
/*           {% else %}*/
/*             <li class="breadcrumb-item"><a href="{{ breadcrumb.href }}" class="link"><span>{{ breadcrumb.text }}</span></a></li>*/
/*           {% endif %}*/
/*         {% endfor %}*/
/*   </ul>*/
/*   {% if success %}*/
/*   <div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> {{ success }}*/
/*     <button type="button" class="close" data-dismiss="alert">&times;</button>*/
/*   </div>*/
/*   {% endif %}*/
/*   <div class="row">{{ column_left }}*/
/*     {% if column_left and column_right %}*/
/*     {% set class = 'col-sm-6' %}*/
/*     {% elseif column_left or column_right %}*/
/*     {% set class = 'col-sm-9' %}*/
/*     {% else %}*/
/*     {% set class = 'col-sm-12' %}*/
/*     {% endif %}*/
/*     <div id="content" class="{{ class }}">{{ content_top }}*/
/*       <h2>{{ heading_title }}</h2>*/
/*       <div class="buttons clearfix">*/
/*         <div class="pull-right">*/
/*           <a href="{{ continue }}" class="btn btn-primary">Add News</a>*/
/*         </div>*/
/*       </div>*/
/*       {% if news %}*/
/*       <div class="table-responsive">*/
/*         <table class="table table-bordered table-hover">*/
/*           <thead>*/
/*             <tr>*/
/*               <td class="text-center">{{ column_image }}</td>*/
/*               <td class="text-left">{{ column_name }}</td>*/
/*               <td class="text-left">{{ column_short }}</td>*/
/*               <td class="text-left">{{ column_desc }}</td>*/
/*               <td class="text-left">{{ column_date }}</td>*/
/*               <td class="text-right">{{ column_action }}</td>*/
/*             </tr>*/
/*           </thead>*/
/*           <tbody>*/
/*           */
/*           {% for new in news %}*/
/*           <tr>*/
/*             <td class="text-center">*/
/*               {% if new.thumb %}*/
/*               <a>*/
/*                 <img src="{{ new.thumb }}" alt="{{ new.name }}" title="{{ new.name }}" />*/
/*                 </a>*/
/*               {% endif %}*/
/*             </td>*/
/*             <td class="text-left">{{ new.name }}</td>*/
/*             <td class="text-left">{{ new.short_name }}</td>*/
/*             <td class="text-left">{{ new.description }}</td>*/
/*             <td class="text-left">{{ new.date_added }}</td>*/
/*             <td class="text-right">*/
/*               <a href="{{ new.edit }}" data-toggle="tooltip" title="Edit" class="btn btn-info">Edit</a>*/
/*               <a href="{{ new.delete }}" data-toggle="tooltip" title="Delete" class="btn btn-danger">Delete</a>*/
/*             </td>*/
/*           </tr>*/
/*           {% endfor %}*/
/*             </tbody>*/
/*           */
/*         </table>*/
/*       </div>*/
/*         <div class="row">*/
/*           <div class="col-sm-6 text-left">{{ pagination }}</div>*/
/*           <div class="col-sm-6 text-right">{{ results }}</div>*/
/*         </div>*/
/*       {% else %}*/
/*       <p>{{ text_empty }}</p>*/
/*       {% endif %}*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* {{ footer }}*/
