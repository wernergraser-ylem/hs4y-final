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

/* @pct_theme_templates/theme/pagination.html5 */
class __TwigTemplate_9baf578a5d586abd8b97668b645bf172 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/pagination.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/pagination.html5"));

        // line 1
        yield "
<!-- indexer::stop -->
<?php 
if( !isset(\$GLOBALS['PAGINATIONS']) )
{
\t\$GLOBALS['PAGINATIONS'] = 0;
}

\$cssId = 'pagination_'.(\$GLOBALS['PAGINATIONS'] ?: 0);
?>

<div id=\"<?= \$cssId; ?>\" class=\"pagination block\">

  <p><?= \$this->total ?></p>

  <ul>
    <?php if (\$this->hasFirst): ?>
      <li class=\"first\"><a href=\"<?= \$this->first['href'] ?>\" class=\"first\" title=\"<?= \$this->first['title'] ?>\"><?= \$this->first['link'] ?></a></li>
    <?php endif; ?>

    <?php if (\$this->hasPrevious): ?>
      <li class=\"previous\"><a href=\"<?= \$this->previous['href'] ?>\" class=\"previous\" title=\"<?= \$this->previous['title'] ?>\"><?= \$this->previous['link'] ?></a></li>
    <?php endif; ?>

    <?php foreach (\$this->pages as \$page): ?>
      <?php if (\$page['href'] === null): ?>
        <li><span class=\"current\"><?= \$page['page'] ?></span></li>
      <?php else: ?>
        <li><a href=\"<?= \$page['href'] ?>\" class=\"link\" title=\"<?= \$page['title'] ?>\"><?= \$page['page'] ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php if (\$this->hasNext): ?>
      <li class=\"next\"><a href=\"<?= \$this->next['href'] ?>\" class=\"next\" title=\"<?= \$this->next['title'] ?>\"><?= \$this->next['link'] ?></a></li>
    <?php endif; ?>

    <?php if (\$this->hasLast): ?>
      <li class=\"last\"><a href=\"<?= \$this->last['href'] ?>\" class=\"last\" title=\"<?= \$this->last['title'] ?>\"><?= \$this->last['link'] ?></a></li>
    <?php endif; ?>
  </ul>

</div>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\t// find parent element that has a valid CSS id. In most cases it is the article
\tvar parents = jQuery('#<?= \$cssId; ?>').parents(\"*\").filter(function() 
\t{ 
\t\treturn jQuery(this).attr('id');
\t});
\tvar anchor = '<?= \$cssId; ?>'; 
\t// the first element in array is the closest one
\tif(parents[0])
\t{
\t\tanchor = jQuery(parents[0]).attr('id');
 \t}
\t// add anchor to each href in the pagination
\tjQuery('#<?= \$cssId; ?> a[href!=\"\"]').each(function() 
\t{
\t\tjQuery(this).attr('href', jQuery(this).attr('href')+'#'+anchor );
\t\tjQuery(this).addClass('not-anchor');
\t});
});

</script>
<!-- SEO-SCRIPT-STOP -->
<?php 
// increase pagination counter
\$GLOBALS['PAGINATIONS']++; ?>
<!-- indexer::continue -->
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
        return "@pct_theme_templates/theme/pagination.html5";
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
<!-- indexer::stop -->
<?php 
if( !isset(\$GLOBALS['PAGINATIONS']) )
{
\t\$GLOBALS['PAGINATIONS'] = 0;
}

\$cssId = 'pagination_'.(\$GLOBALS['PAGINATIONS'] ?: 0);
?>

<div id=\"<?= \$cssId; ?>\" class=\"pagination block\">

  <p><?= \$this->total ?></p>

  <ul>
    <?php if (\$this->hasFirst): ?>
      <li class=\"first\"><a href=\"<?= \$this->first['href'] ?>\" class=\"first\" title=\"<?= \$this->first['title'] ?>\"><?= \$this->first['link'] ?></a></li>
    <?php endif; ?>

    <?php if (\$this->hasPrevious): ?>
      <li class=\"previous\"><a href=\"<?= \$this->previous['href'] ?>\" class=\"previous\" title=\"<?= \$this->previous['title'] ?>\"><?= \$this->previous['link'] ?></a></li>
    <?php endif; ?>

    <?php foreach (\$this->pages as \$page): ?>
      <?php if (\$page['href'] === null): ?>
        <li><span class=\"current\"><?= \$page['page'] ?></span></li>
      <?php else: ?>
        <li><a href=\"<?= \$page['href'] ?>\" class=\"link\" title=\"<?= \$page['title'] ?>\"><?= \$page['page'] ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php if (\$this->hasNext): ?>
      <li class=\"next\"><a href=\"<?= \$this->next['href'] ?>\" class=\"next\" title=\"<?= \$this->next['title'] ?>\"><?= \$this->next['link'] ?></a></li>
    <?php endif; ?>

    <?php if (\$this->hasLast): ?>
      <li class=\"last\"><a href=\"<?= \$this->last['href'] ?>\" class=\"last\" title=\"<?= \$this->last['title'] ?>\"><?= \$this->last['link'] ?></a></li>
    <?php endif; ?>
  </ul>

</div>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\t// find parent element that has a valid CSS id. In most cases it is the article
\tvar parents = jQuery('#<?= \$cssId; ?>').parents(\"*\").filter(function() 
\t{ 
\t\treturn jQuery(this).attr('id');
\t});
\tvar anchor = '<?= \$cssId; ?>'; 
\t// the first element in array is the closest one
\tif(parents[0])
\t{
\t\tanchor = jQuery(parents[0]).attr('id');
 \t}
\t// add anchor to each href in the pagination
\tjQuery('#<?= \$cssId; ?> a[href!=\"\"]').each(function() 
\t{
\t\tjQuery(this).attr('href', jQuery(this).attr('href')+'#'+anchor );
\t\tjQuery(this).addClass('not-anchor');
\t});
});

</script>
<!-- SEO-SCRIPT-STOP -->
<?php 
// increase pagination counter
\$GLOBALS['PAGINATIONS']++; ?>
<!-- indexer::continue -->
", "@pct_theme_templates/theme/pagination.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/pagination.html5");
    }
}
