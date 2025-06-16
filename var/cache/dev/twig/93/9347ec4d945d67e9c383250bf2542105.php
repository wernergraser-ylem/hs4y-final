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

/* @pct_customelements_plugin_customcatalog/forms/form_customcatalog_filter.html5 */
class __TwigTemplate_c78368d23eadb174e9211a25a6108f7d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/forms/form_customcatalog_filter.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements_plugin_customcatalog/forms/form_customcatalog_filter.html5"));

        // line 1
        yield "<?php
/**
 * CustomCatalog filter formular template
 */\t
?>

<?php if(\$this->filters): ?>
<!-- indexer::stop -->
<div class=\"<?php echo \$this->formClass; ?> <?php echo \$this->tableless ? 'tableless' : 'tableform'; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

  <form<?php if (\$this->action): ?> action=\"<?php echo \$this->action; ?>\"<?php endif; ?> id=\"<?php echo \$this->formId; ?>\" name=\"<?php echo \$this->formName;?>\" method=\"<?php echo \$this->method; ?>\" enctype=\"application/x-www-form-urlencoded\" <?php echo \$this->attributes; ?>>
    <div class=\"formbody\">
      <?php if (\$this->method != 'get'): ?>
        <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?php echo \$this->formSubmit; ?>\">
        <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
      <?php endif; ?>
      <?php echo \$this->hidden; ?>
\t  
\t  <?php foreach(\$this->filters as \$name => \$filter): ?>
\t  <?php echo \$filter->html();?>
\t  <?php endforeach; ?>
\t  
\t  <?php if(\$this->hasSubmit): ?>
      <div class=\"widget submit_container submit\">
      <?php echo \$this->submit; ?>
      </div>
      <?php endif;?>
      
      <div class=\"widget submit_container clear_filters\">
      <?php echo \$this->clear; ?>
      </div>
      
      <div class=\"widget submit_container clearall clear_all_filters\">
      <?php echo \$this->clearAll; ?>
      </div>
      
    </div>
  </form>

</div>
<!-- indexer::continue -->
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements_plugin_customcatalog/forms/form_customcatalog_filter.html5";
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
        return new Source("<?php
/**
 * CustomCatalog filter formular template
 */\t
?>

<?php if(\$this->filters): ?>
<!-- indexer::stop -->
<div class=\"<?php echo \$this->formClass; ?> <?php echo \$this->tableless ? 'tableless' : 'tableform'; ?> block\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>

  <form<?php if (\$this->action): ?> action=\"<?php echo \$this->action; ?>\"<?php endif; ?> id=\"<?php echo \$this->formId; ?>\" name=\"<?php echo \$this->formName;?>\" method=\"<?php echo \$this->method; ?>\" enctype=\"application/x-www-form-urlencoded\" <?php echo \$this->attributes; ?>>
    <div class=\"formbody\">
      <?php if (\$this->method != 'get'): ?>
        <input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"<?php echo \$this->formSubmit; ?>\">
        <input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
      <?php endif; ?>
      <?php echo \$this->hidden; ?>
\t  
\t  <?php foreach(\$this->filters as \$name => \$filter): ?>
\t  <?php echo \$filter->html();?>
\t  <?php endforeach; ?>
\t  
\t  <?php if(\$this->hasSubmit): ?>
      <div class=\"widget submit_container submit\">
      <?php echo \$this->submit; ?>
      </div>
      <?php endif;?>
      
      <div class=\"widget submit_container clear_filters\">
      <?php echo \$this->clear; ?>
      </div>
      
      <div class=\"widget submit_container clearall clear_all_filters\">
      <?php echo \$this->clearAll; ?>
      </div>
      
    </div>
  </form>

</div>
<!-- indexer::continue -->
<?php else: ?>
<p class=\"info empty\"><?php echo \$this->empty; ?></p>
<?php endif; ?>", "@pct_customelements_plugin_customcatalog/forms/form_customcatalog_filter.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements_plugin_customcatalog/templates/forms/form_customcatalog_filter.html5");
    }
}
