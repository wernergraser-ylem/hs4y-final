<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @pct_customelements/backend/be_maintenance_resolvevault.html5 */
class __TwigTemplate_eafbe8b9ec780a8265ca385ccaf8c3f7 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_resolvevault.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_resolvevault.html5"));

        // line 1
        yield "
<div id=\"tl_maintenance_index\" class=\"maintenance_<?php echo \$this->isActive ? 'active' : 'inactive'; ?>\">

<h2 class=\"sub_headline_index\"><?php echo \$this->indexHeadline; ?></h2>

<?php if (\$this->indexMessage): ?>
  <div class=\"tl_message\">
\t<p class=\"tl_error\"><?php echo \$this->indexMessage; ?></p>
  </div>
<?php endif; ?>

<?php if (\$this->completed): ?>
<div id=\"tl_rebuild_index\">
\t<p id=\"index_complete\"><?php echo \$this->complete; ?></p>
\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
  </div>
<?php endif; ?>


<?php if (\$this->isRunning): ?>
  <div id=\"tl_rebuild_index\">
\t<p id=\"index_loading\"><?php echo \$this->loading; ?></p>
\t<p id=\"index_complete\" style=\"display:none\"><?php echo \$this->complete; ?></p>
\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
  </div>

  <script type=\"text/javascript\">
  /* <![CDATA[ */
  window.addEvent('domready', function() 
  {
\t  var urls = \$\$('.vault_data');
\t  var last = urls.length-1; 
  
\t  function runStep(i)
\t  {
\t\t  var el = urls[i];
\t\t  
\t\t  new Request(
\t\t  {
\t\t\t  'url': location.href,
\t\t\t  'data': 'vault_id='+el.getAttribute('data-vault_id'),
\t\t\t  onComplete: function() 
\t\t\t  {
\t\t\t\t  el.addClass('tl_green');
\t\t\t\t  if(i < last)
\t\t\t\t  {
\t\t\t\t\t  return runStep(i+1);
\t\t\t\t  }
\t\t\t\t  else
\t\t\t\t  {
\t\t\t\t\t  \$('index_loading').setStyle('display', 'none');
\t\t\t\t\t  \$('index_complete').setStyle('display', 'block');
\t\t\t\t  }
\t\t\t  },
\t\t\t  onFailure: function()
\t\t\t  {
\t\t\t\t  el.addClass('tl_red');
\t\t\t  },
\t\t\t  onException: function()
\t\t\t  {
\t\t\t\t  el.addClass('tl_red');
\t\t\t  }
\t\t  }).get();
\t  }
\t  runStep(0);
  });
  /* ]]> */\t
  </script>
  <?php endif; ?>
  
  <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"get\">
\t<div class=\"tl_submit_container\">
\t  <input type=\"hidden\" name=\"do\" value=\"maintenance\">
\t  <input type=\"submit\" id=\"index\" class=\"tl_submit\" value=\"<?php echo \$this->indexContinue; ?>\">
\t</div>
  </form>
  
</div>


";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements/backend/be_maintenance_resolvevault.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<div id=\"tl_maintenance_index\" class=\"maintenance_<?php echo \$this->isActive ? 'active' : 'inactive'; ?>\">

<h2 class=\"sub_headline_index\"><?php echo \$this->indexHeadline; ?></h2>

<?php if (\$this->indexMessage): ?>
  <div class=\"tl_message\">
\t<p class=\"tl_error\"><?php echo \$this->indexMessage; ?></p>
  </div>
<?php endif; ?>

<?php if (\$this->completed): ?>
<div id=\"tl_rebuild_index\">
\t<p id=\"index_complete\"><?php echo \$this->complete; ?></p>
\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
  </div>
<?php endif; ?>


<?php if (\$this->isRunning): ?>
  <div id=\"tl_rebuild_index\">
\t<p id=\"index_loading\"><?php echo \$this->loading; ?></p>
\t<p id=\"index_complete\" style=\"display:none\"><?php echo \$this->complete; ?></p>
\t<p style=\"margin-bottom:0\"><?php echo \$this->content; ?></p>
  </div>

  <script type=\"text/javascript\">
  /* <![CDATA[ */
  window.addEvent('domready', function() 
  {
\t  var urls = \$\$('.vault_data');
\t  var last = urls.length-1; 
  
\t  function runStep(i)
\t  {
\t\t  var el = urls[i];
\t\t  
\t\t  new Request(
\t\t  {
\t\t\t  'url': location.href,
\t\t\t  'data': 'vault_id='+el.getAttribute('data-vault_id'),
\t\t\t  onComplete: function() 
\t\t\t  {
\t\t\t\t  el.addClass('tl_green');
\t\t\t\t  if(i < last)
\t\t\t\t  {
\t\t\t\t\t  return runStep(i+1);
\t\t\t\t  }
\t\t\t\t  else
\t\t\t\t  {
\t\t\t\t\t  \$('index_loading').setStyle('display', 'none');
\t\t\t\t\t  \$('index_complete').setStyle('display', 'block');
\t\t\t\t  }
\t\t\t  },
\t\t\t  onFailure: function()
\t\t\t  {
\t\t\t\t  el.addClass('tl_red');
\t\t\t  },
\t\t\t  onException: function()
\t\t\t  {
\t\t\t\t  el.addClass('tl_red');
\t\t\t  }
\t\t  }).get();
\t  }
\t  runStep(0);
  });
  /* ]]> */\t
  </script>
  <?php endif; ?>
  
  <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"get\">
\t<div class=\"tl_submit_container\">
\t  <input type=\"hidden\" name=\"do\" value=\"maintenance\">
\t  <input type=\"submit\" id=\"index\" class=\"tl_submit\" value=\"<?php echo \$this->indexContinue; ?>\">
\t</div>
  </form>
  
</div>


", "@pct_customelements/backend/be_maintenance_resolvevault.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_maintenance_resolvevault.html5");
    }
}
