<?php

/* essence/template/common/search.twig */
class __TwigTemplate_67fe77bcf16a8062383c1fdeb32661e5d39b7ab091625c39391372aa71e75c7d extends Twig_Template
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
        echo "<div class=\"modal fade\" tabindex=\"-1\" id=\"searchmodal\" role=\"dialog\" >
  <div class=\"modal-dialog modal-block\" role=\"document\">
  <button type=\"button\" data-dismiss=\"modal\" aria-label=\"close\" class=\"modal-close\"><span aria-hidden=\"true\">&times;</span></button>
    <div class=\"menu-modal\" id=\"search\">
<input type=\"text\" name=\"search\" value=\"";
        // line 5
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["text_search"]) ? $context["text_search"] : null);
        echo "\"  />
<button type=\"button\" ><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"icon-search\"><circle cx=\"11\" cy=\"11\" r=\"8\"></circle><line x1=\"21\" y1=\"21\" x2=\"16.65\" y2=\"16.65\"></line></svg></button>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "essence/template/common/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 5,  19 => 1,);
    }
}
/* <div class="modal fade" tabindex="-1" id="searchmodal" role="dialog" >*/
/*   <div class="modal-dialog modal-block" role="document">*/
/*   <button type="button" data-dismiss="modal" aria-label="close" class="modal-close"><span aria-hidden="true">&times;</span></button>*/
/*     <div class="menu-modal" id="search">*/
/* <input type="text" name="search" value="{{ search }}" placeholder="{{ text_search }}"  />*/
/* <button type="button" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
