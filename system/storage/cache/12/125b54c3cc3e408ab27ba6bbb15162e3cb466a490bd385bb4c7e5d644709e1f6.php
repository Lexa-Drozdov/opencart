<?php

/* essence/template/account/newsedit.twig */
class __TwigTemplate_c8b7b2746f725bdf8ebfd2aa40ddc56bb882bc6ad73f4317fee9a8c9e5d3027f extends Twig_Template
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
<div id=\"account-edit\" class=\"container-fluid\">
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
        if ((isset($context["error_warning"]) ? $context["error_warning"] : null)) {
            // line 15
            echo "  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo (isset($context["error_warning"]) ? $context["error_warning"] : null);
            echo "</div>
  ";
        }
        // line 17
        echo "  <div class=\"row\">";
        echo (isset($context["column_left"]) ? $context["column_left"] : null);
        echo "
    ";
        // line 18
        if (((isset($context["column_left"]) ? $context["column_left"] : null) && (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 19
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 20
            echo "    ";
        } elseif (((isset($context["column_left"]) ? $context["column_left"] : null) || (isset($context["column_right"]) ? $context["column_right"] : null))) {
            // line 21
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 22
            echo "    ";
        } else {
            // line 23
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 24
            echo "    ";
        }
        // line 25
        echo "    <div id=\"content\" class=\"";
        echo (isset($context["class"]) ? $context["class"] : null);
        echo "\">";
        echo (isset($context["content_top"]) ? $context["content_top"] : null);
        echo "
      <h1>Edit News</h1>
      <form action=\"";
        // line 27
        echo (isset($context["action"]) ? $context["action"] : null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
          <input type=\"hidden\" name=\"id\" value=\"";
        // line 28
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\">
        <fieldset>
          <legend>";
        // line 30
        echo (isset($context["text_your_details"]) ? $context["text_your_details"] : null);
        echo "</legend>

            <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">Name</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 35
        echo (isset($context["name"]) ? $context["name"] : null);
        echo "\" placeholder=\"Name\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 36
        if ((isset($context["error_name"]) ? $context["error_name"] : null)) {
            // line 37
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_name"]) ? $context["error_name"] : null);
            echo "</div>
              ";
        }
        // line 39
        echo "            </div>
          </div>

            <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-short_name\">Short Name </label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"short_name\" value=\"";
        // line 45
        echo (isset($context["short_name"]) ? $context["short_name"] : null);
        echo "\" placeholder=\"Short Name\" id=\"input-short_name\" class=\"form-control\" />
              ";
        // line 46
        if ((isset($context["error_short_name"]) ? $context["error_short_name"] : null)) {
            // line 47
            echo "              <div class=\"text-danger\">";
            echo (isset($context["error_short_name"]) ? $context["error_short_name"] : null);
            echo "</div>
              ";
        }
        // line 49
        echo "            </div>
          </div>

            <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-description\">Description</label>
            <div class=\"col-sm-10\">
             <textarea name=\"description\" rows=\"10\" id=\"input-description\" class=\"form-control\">";
        // line 55
        echo (isset($context["description"]) ? $context["description"] : null);
        echo "</textarea>
                ";
        // line 56
        if ((isset($context["error_description"]) ? $context["error_description"] : null)) {
            // line 57
            echo "                    <div class=\"text-danger\">";
            echo (isset($context["error_description"]) ? $context["error_description"] : null);
            echo "</div>
                ";
        }
        // line 59
        echo "            </div>
          </div>

            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Image</label>
                <div class=\"col-sm-10\">
                <a href=\"\" id=\"thumb-image\" data-toggle=\"image\" class=\"img-thumbnail\">
                    <img src=\"";
        // line 66
        echo (isset($context["thumb"]) ? $context["thumb"] : null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo (isset($context["placeholder"]) ? $context["placeholder"] : null);
        echo "\" />
                </a>
            <input type=\"hidden\" name=\"image\" value=\"";
        // line 68
        echo (isset($context["image"]) ? $context["image"] : null);
        echo "\" id=\"input-image\" />
            </div>
           </div>

            <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-filename\">File</label>
                <div class=\"col-sm-10\">
                    <div class=\"input-group\">
                        <input type=\"text\" name=\"filename\" value=\"";
        // line 76
        echo (isset($context["filename"]) ? $context["filename"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_filename"]) ? $context["entry_filename"] : null);
        echo "\" id=\"input-filename\" class=\"form-control\" />
                        <span class=\"input-group-btn\">
                <button type=\"button\" id=\"button-upload\" data-loading-text=\"";
        // line 78
        echo (isset($context["text_loading"]) ? $context["text_loading"] : null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-upload\"></i> ";
        echo (isset($context["button_upload"]) ? $context["button_upload"] : null);
        echo "</button>
                </span> </div>
                    ";
        // line 80
        if ((isset($context["error_filename"]) ? $context["error_filename"] : null)) {
            // line 81
            echo "                        <div class=\"text-danger\">";
            echo (isset($context["error_filename"]) ? $context["error_filename"] : null);
            echo "</div>
                    ";
        }
        // line 83
        echo "                    ";
        if ((isset($context["error_mask"]) ? $context["error_mask"] : null)) {
            // line 84
            echo "                        <div class=\"text-danger\">";
            echo (isset($context["error_mask"]) ? $context["error_mask"] : null);
            echo "</div>
                    ";
        }
        // line 86
        echo "                </div>
            </div>
            <div style=\"display: none\" class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-mask\"><span data-toggle=\"tooltip\" title=\"";
        // line 89
        echo (isset($context["help_mask"]) ? $context["help_mask"] : null);
        echo "\">";
        echo (isset($context["entry_mask"]) ? $context["entry_mask"] : null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"mask\" value=\"";
        // line 91
        echo (isset($context["mask"]) ? $context["mask"] : null);
        echo "\" placeholder=\"";
        echo (isset($context["entry_mask"]) ? $context["entry_mask"] : null);
        echo "\" id=\"input-mask\" class=\"form-control\" />
                </div>
            </div>

            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">Status</label>
                <div class=\"col-sm-10\">
                    ";
        // line 98
        if ((isset($context["status"]) ? $context["status"] : null)) {
            // line 99
            echo "                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"status\" value=\"1\" checked=\"checked\" />
                            ";
            // line 101
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"status\" value=\"0\" />
                            ";
            // line 104
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</label>
                    ";
        } else {
            // line 106
            echo "                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"status\" value=\"1\" />
                            ";
            // line 108
            echo (isset($context["text_yes"]) ? $context["text_yes"] : null);
            echo "</label>
                        <label class=\"radio-inline\">
                            <input type=\"radio\" name=\"status\" value=\"0\" checked=\"checked\" />
                            ";
            // line 111
            echo (isset($context["text_no"]) ? $context["text_no"] : null);
            echo "</label>
                    ";
        }
        // line 113
        echo "                </div>
            </div>
        </fieldset>

        <div class=\"buttons clearfix\">
          <div class=\"pull-left\"><a href=\"";
        // line 118
        echo (isset($context["back"]) ? $context["back"] : null);
        echo "\" class=\"btn btn-default\">";
        echo (isset($context["button_back"]) ? $context["button_back"] : null);
        echo "</a></div>
          <div class=\"pull-right\">
            <input type=\"submit\" value=\"Save\" class=\"btn btn-primary\" />
          </div>
        </div>

      </form>
      ";
        // line 125
        echo (isset($context["content_bottom"]) ? $context["content_bottom"] : null);
        echo "</div>
    ";
        // line 126
        echo (isset($context["column_right"]) ? $context["column_right"] : null);
        echo "</div>
</div>
<script type=\"text/javascript\">

    // Image Manager
    \$(document).on('click', 'a[data-toggle=\\'image\\']', function(e) {
        var \$element = \$(this);
        var \$popover = \$element.data('bs.popover'); // element has bs popover?

        e.preventDefault();

        // destroy all image popovers
        \$('a[data-toggle=\"image\"]').popover('destroy');

        // remove flickering (do not re-add popover when clicking for removal)
        if (\$popover) {
            return;
        }

        \$element.popover({
            html: true,
            placement: 'right',
            trigger: 'manual',
            content: function() {
                return '<button type=\"button\" id=\"button-image\" class=\"btn btn-primary\"><i class=\"fa fa-pencil\"></i></button> <button type=\"button\" id=\"button-clear\" class=\"btn btn-danger\"><i class=\"fa fa-trash-o\"></i></button>';
            }
        });

        \$element.popover('show');

        \$('#button-image').on('click', function() {
            var \$button = \$(this);
            var \$icon   = \$button.find('> i');

            \$('#modal-image').remove();

            \$.ajax({
                url: 'index.php?route=common/filemanager&target=' + \$element.parent().find('input').attr('id') + '&thumb=' + \$element.attr('id'),
                dataType: 'html',
                beforeSend: function() {
                    \$button.prop('disabled', true);
                    if (\$icon.length) {
                        \$icon.attr('class', 'fa fa-circle-o-notch fa-spin');
                    }
                },
                complete: function() {
                    \$button.prop('disabled', false);

                    if (\$icon.length) {
                        \$icon.attr('class', 'fa fa-pencil');
                    }
                },
                success: function(html) {
                    \$('body').append('<div id=\"modal-image\" class=\"modal\">' + html + '</div>');

                    \$('#modal-image').modal('show');
                }
            });

            \$element.popover('destroy');
        });

        \$('#button-clear').on('click', function() {
            \$element.find('img').attr('src', \$element.find('img').attr('data-placeholder'));

            \$element.parent().find('input').val('');

            \$element.popover('destroy');
        });
    });

    \$('#button-upload').on('click', function() {
        \$('#form-upload').remove();

        \$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');

        \$('#form-upload input[name=\\'file\\']').trigger('click');

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function() {
            if (\$('#form-upload input[name=\\'file\\']').val() != '') {
                clearInterval(timer);

                \$.ajax({
                    url: 'index.php?route=account/news/upload&user_token=";
        // line 213
        echo (isset($context["user_token"]) ? $context["user_token"] : null);
        echo "',
                    type: 'post',
                    dataType: 'json',
                    data: new FormData(\$('#form-upload')[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        \$('#button-upload').button('loading');
                    },
                    complete: function() {
                        \$('#button-upload').button('reset');
                    },
                    success: function(json) {
                        if (json['error']) {
                            alert(json['error']);
                        }

                        if (json['success']) {
                            alert(json['success']);

                            \$('input[name=\\'filename\\']').val(json['filename']);
                            \$('input[name=\\'mask\\']').val(json['mask']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
                    }
                });
            }
        }, 500);
    });



//--></script>
";
        // line 249
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "essence/template/account/newsedit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  461 => 249,  422 => 213,  332 => 126,  328 => 125,  316 => 118,  309 => 113,  304 => 111,  298 => 108,  294 => 106,  289 => 104,  283 => 101,  279 => 99,  277 => 98,  265 => 91,  258 => 89,  253 => 86,  247 => 84,  244 => 83,  238 => 81,  236 => 80,  229 => 78,  222 => 76,  211 => 68,  204 => 66,  195 => 59,  189 => 57,  187 => 56,  183 => 55,  175 => 49,  169 => 47,  167 => 46,  163 => 45,  155 => 39,  149 => 37,  147 => 36,  143 => 35,  135 => 30,  130 => 28,  126 => 27,  118 => 25,  115 => 24,  112 => 23,  109 => 22,  106 => 21,  103 => 20,  100 => 19,  98 => 18,  93 => 17,  87 => 15,  85 => 14,  82 => 13,  68 => 12,  60 => 10,  52 => 8,  50 => 7,  45 => 6,  42 => 5,  25 => 4,  19 => 1,);
    }
}
/* {{ header }}*/
/* <div id="account-edit" class="container-fluid">*/
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
/*   {% if error_warning %}*/
/*   <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> {{ error_warning }}</div>*/
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
/*       <h1>Edit News</h1>*/
/*       <form action="{{ action }}" method="post" enctype="multipart/form-data" class="form-horizontal">*/
/*           <input type="hidden" name="id" value="{{ id }}">*/
/*         <fieldset>*/
/*           <legend>{{ text_your_details }}</legend>*/
/* */
/*             <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-name">Name</label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="name" value="{{ name }}" placeholder="Name" id="input-name" class="form-control" />*/
/*               {% if error_name %}*/
/*               <div class="text-danger">{{ error_name }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/* */
/*             <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-short_name">Short Name </label>*/
/*             <div class="col-sm-10">*/
/*               <input type="text" name="short_name" value="{{ short_name }}" placeholder="Short Name" id="input-short_name" class="form-control" />*/
/*               {% if error_short_name %}*/
/*               <div class="text-danger">{{ error_short_name }}</div>*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/* */
/*             <div class="form-group required">*/
/*             <label class="col-sm-2 control-label" for="input-description">Description</label>*/
/*             <div class="col-sm-10">*/
/*              <textarea name="description" rows="10" id="input-description" class="form-control">{{ description }}</textarea>*/
/*                 {% if error_description %}*/
/*                     <div class="text-danger">{{ error_description }}</div>*/
/*                 {% endif %}*/
/*             </div>*/
/*           </div>*/
/* */
/*             <div class="form-group">*/
/*                 <label class="col-sm-2 control-label">Image</label>*/
/*                 <div class="col-sm-10">*/
/*                 <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail">*/
/*                     <img src="{{ thumb }}" alt="" title="" data-placeholder="{{ placeholder }}" />*/
/*                 </a>*/
/*             <input type="hidden" name="image" value="{{ image }}" id="input-image" />*/
/*             </div>*/
/*            </div>*/
/* */
/*             <div class="form-group required">*/
/*                 <label class="col-sm-2 control-label" for="input-filename">File</label>*/
/*                 <div class="col-sm-10">*/
/*                     <div class="input-group">*/
/*                         <input type="text" name="filename" value="{{ filename }}" placeholder="{{ entry_filename }}" id="input-filename" class="form-control" />*/
/*                         <span class="input-group-btn">*/
/*                 <button type="button" id="button-upload" data-loading-text="{{ text_loading }}" class="btn btn-primary"><i class="fa fa-upload"></i> {{ button_upload }}</button>*/
/*                 </span> </div>*/
/*                     {% if error_filename %}*/
/*                         <div class="text-danger">{{ error_filename }}</div>*/
/*                     {% endif %}*/
/*                     {% if error_mask %}*/
/*                         <div class="text-danger">{{ error_mask }}</div>*/
/*                     {% endif %}*/
/*                 </div>*/
/*             </div>*/
/*             <div style="display: none" class="form-group required">*/
/*                 <label class="col-sm-2 control-label" for="input-mask"><span data-toggle="tooltip" title="{{ help_mask }}">{{ entry_mask }}</span></label>*/
/*                 <div class="col-sm-10">*/
/*                     <input type="text" name="mask" value="{{ mask }}" placeholder="{{ entry_mask }}" id="input-mask" class="form-control" />*/
/*                 </div>*/
/*             </div>*/
/* */
/*             <div class="form-group">*/
/*                 <label class="col-sm-2 control-label">Status</label>*/
/*                 <div class="col-sm-10">*/
/*                     {% if status %}*/
/*                         <label class="radio-inline">*/
/*                             <input type="radio" name="status" value="1" checked="checked" />*/
/*                             {{ text_yes }}</label>*/
/*                         <label class="radio-inline">*/
/*                             <input type="radio" name="status" value="0" />*/
/*                             {{ text_no }}</label>*/
/*                     {% else %}*/
/*                         <label class="radio-inline">*/
/*                             <input type="radio" name="status" value="1" />*/
/*                             {{ text_yes }}</label>*/
/*                         <label class="radio-inline">*/
/*                             <input type="radio" name="status" value="0" checked="checked" />*/
/*                             {{ text_no }}</label>*/
/*                     {% endif %}*/
/*                 </div>*/
/*             </div>*/
/*         </fieldset>*/
/* */
/*         <div class="buttons clearfix">*/
/*           <div class="pull-left"><a href="{{ back }}" class="btn btn-default">{{ button_back }}</a></div>*/
/*           <div class="pull-right">*/
/*             <input type="submit" value="Save" class="btn btn-primary" />*/
/*           </div>*/
/*         </div>*/
/* */
/*       </form>*/
/*       {{ content_bottom }}</div>*/
/*     {{ column_right }}</div>*/
/* </div>*/
/* <script type="text/javascript">*/
/* */
/*     // Image Manager*/
/*     $(document).on('click', 'a[data-toggle=\'image\']', function(e) {*/
/*         var $element = $(this);*/
/*         var $popover = $element.data('bs.popover'); // element has bs popover?*/
/* */
/*         e.preventDefault();*/
/* */
/*         // destroy all image popovers*/
/*         $('a[data-toggle="image"]').popover('destroy');*/
/* */
/*         // remove flickering (do not re-add popover when clicking for removal)*/
/*         if ($popover) {*/
/*             return;*/
/*         }*/
/* */
/*         $element.popover({*/
/*             html: true,*/
/*             placement: 'right',*/
/*             trigger: 'manual',*/
/*             content: function() {*/
/*                 return '<button type="button" id="button-image" class="btn btn-primary"><i class="fa fa-pencil"></i></button> <button type="button" id="button-clear" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>';*/
/*             }*/
/*         });*/
/* */
/*         $element.popover('show');*/
/* */
/*         $('#button-image').on('click', function() {*/
/*             var $button = $(this);*/
/*             var $icon   = $button.find('> i');*/
/* */
/*             $('#modal-image').remove();*/
/* */
/*             $.ajax({*/
/*                 url: 'index.php?route=common/filemanager&target=' + $element.parent().find('input').attr('id') + '&thumb=' + $element.attr('id'),*/
/*                 dataType: 'html',*/
/*                 beforeSend: function() {*/
/*                     $button.prop('disabled', true);*/
/*                     if ($icon.length) {*/
/*                         $icon.attr('class', 'fa fa-circle-o-notch fa-spin');*/
/*                     }*/
/*                 },*/
/*                 complete: function() {*/
/*                     $button.prop('disabled', false);*/
/* */
/*                     if ($icon.length) {*/
/*                         $icon.attr('class', 'fa fa-pencil');*/
/*                     }*/
/*                 },*/
/*                 success: function(html) {*/
/*                     $('body').append('<div id="modal-image" class="modal">' + html + '</div>');*/
/* */
/*                     $('#modal-image').modal('show');*/
/*                 }*/
/*             });*/
/* */
/*             $element.popover('destroy');*/
/*         });*/
/* */
/*         $('#button-clear').on('click', function() {*/
/*             $element.find('img').attr('src', $element.find('img').attr('data-placeholder'));*/
/* */
/*             $element.parent().find('input').val('');*/
/* */
/*             $element.popover('destroy');*/
/*         });*/
/*     });*/
/* */
/*     $('#button-upload').on('click', function() {*/
/*         $('#form-upload').remove();*/
/* */
/*         $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');*/
/* */
/*         $('#form-upload input[name=\'file\']').trigger('click');*/
/* */
/*         if (typeof timer != 'undefined') {*/
/*             clearInterval(timer);*/
/*         }*/
/* */
/*         timer = setInterval(function() {*/
/*             if ($('#form-upload input[name=\'file\']').val() != '') {*/
/*                 clearInterval(timer);*/
/* */
/*                 $.ajax({*/
/*                     url: 'index.php?route=account/news/upload&user_token={{ user_token }}',*/
/*                     type: 'post',*/
/*                     dataType: 'json',*/
/*                     data: new FormData($('#form-upload')[0]),*/
/*                     cache: false,*/
/*                     contentType: false,*/
/*                     processData: false,*/
/*                     beforeSend: function() {*/
/*                         $('#button-upload').button('loading');*/
/*                     },*/
/*                     complete: function() {*/
/*                         $('#button-upload').button('reset');*/
/*                     },*/
/*                     success: function(json) {*/
/*                         if (json['error']) {*/
/*                             alert(json['error']);*/
/*                         }*/
/* */
/*                         if (json['success']) {*/
/*                             alert(json['success']);*/
/* */
/*                             $('input[name=\'filename\']').val(json['filename']);*/
/*                             $('input[name=\'mask\']').val(json['mask']);*/
/*                         }*/
/*                     },*/
/*                     error: function(xhr, ajaxOptions, thrownError) {*/
/*                         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);*/
/*                     }*/
/*                 });*/
/*             }*/
/*         }, 500);*/
/*     });*/
/* */
/* */
/* */
/* //--></script>*/
/* {{ footer }}*/
/* */
