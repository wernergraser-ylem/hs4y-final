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

/* @pct_autogrid/backend/be_page_grid_preset.html5 */
class __TwigTemplate_985994541bd2726d3e6ed19aaf5accec extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/backend/be_page_grid_preset.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_autogrid/backend/be_page_grid_preset.html5"));

        // line 1
        yield "<?php

use PCT\\AutoGrid\\Controller;
?>

<div id=\"page_grid_presets\" class=\"contao-ht35\">
\t<!-- category select -->
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= Controller::request_token(); ?>\">

\t<div class=\"tl_formbody\">
\t\t<div class=\"tl_panel categories\">
\t\t<div class=\"float_box\"><?= \$this->categoryWidget; ?></div>
\t\t<div class=\"float_box\">
\t\t\t<?php
\t\t\t\$img_reload = 'system/themes/flexible/icons/filter-apply.svg';
\t\t\t?>
\t\t\t<input type=\"image\" name=\"filter\" id=\"filter\" src=\"<?= \$img_reload; ?>\" class=\"tl_img_submit\" alt=\"ok\">

\t\t</div>
\t\t<div class=\"clear\"></div>
\t\t</div>
\t</div>
\t</form>

\t<div id=\"tl_buttons\"><?= \$this->back ?></div>

\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>

\t<div class=\"content_wrapper form_wrapper\">

\t\t<div class=\"counter\"><?= sprintf(\$GLOBALS['TL_LANG']['page_grid_preset']['counter'],count(\$this->elements)); ?></div>

\t\t<div class=\"inside grid_wrapper grid_size_<?= \$this->columnCount; ?>\">
\t\t\t<?php foreach(\$this->columns as \$category => \$arrColumns): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['page_grid_preset']['categories'][\$category] ?: \$category; ?></h2>

\t\t\t\t<div class=\"items\">
\t\t\t\t\t<?php foreach(\$arrColumns as \$index => \$arrElements): ?>
\t\t\t\t\t<div class=\"item item_<?= \$index; ?> size_<?= \$this->columnCount; ?>\">
\t\t\t\t\t\t<?php foreach(\$arrElements as \$i => \$data): ?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\">
\t\t\t\t\t\t\t<div class=\"inside\">
\t\t\t\t\t\t\t\t<?php 
\t\t\t\t\t\t\t\t\$label = \$data['label'];
\t\t\t\t\t\t\t\tif( \$data['config']['grid']['desktop'] )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$label = \$data['config']['grid']['desktop'];
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\tif( \$GLOBALS['TL_LANG']['autogrid_grid'][ \$data['name'] ] )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$label = \$GLOBALS['TL_LANG']['autogrid_grid'][ \$data['name'] ];
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t?>
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$label; ?></div>

\t\t\t\t\t\t\t\t<!-- grid preview -->
\t\t\t\t\t\t\t\t<div class=\"grid_preview autogrid_grid <?= 'd_'.\$data['name']; ?>\">
\t\t\t\t\t\t\t\t\t<?php foreach(explode('_',\$data['name']) as \$i => \$pct): ?>
\t\t\t\t\t\t\t\t\t<div class=\"column\"><div class=\"attribute\">&nbsp;</div></div>
\t\t\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form action=\"<?= \$this->action; ?>\" id=\"form_<?= \$data['name']; ?>\" class=\"tl_form hidden\" method='post'>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"GRID_PRESET\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= Controller::request_token(); ?>\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENT\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t</form>

\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t// submit form
\t\t\t\t\t\t\twindow.addEvent('domready', function()
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$\$('#<?= \$data['name']; ?>').addEvent('click', function()
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tdocument.getElementById('form_<?= \$data['name']; ?>').submit();
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t</div>
\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>


\t\t\t\t<div class=\"clear\"></div>
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t</div>
\t\t<div class=\"clear\"></div>
\t</div>
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
        return "@pct_autogrid/backend/be_page_grid_preset.html5";
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

use PCT\\AutoGrid\\Controller;
?>

<div id=\"page_grid_presets\" class=\"contao-ht35\">
\t<!-- category select -->
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= Controller::request_token(); ?>\">

\t<div class=\"tl_formbody\">
\t\t<div class=\"tl_panel categories\">
\t\t<div class=\"float_box\"><?= \$this->categoryWidget; ?></div>
\t\t<div class=\"float_box\">
\t\t\t<?php
\t\t\t\$img_reload = 'system/themes/flexible/icons/filter-apply.svg';
\t\t\t?>
\t\t\t<input type=\"image\" name=\"filter\" id=\"filter\" src=\"<?= \$img_reload; ?>\" class=\"tl_img_submit\" alt=\"ok\">

\t\t</div>
\t\t<div class=\"clear\"></div>
\t\t</div>
\t</div>
\t</form>

\t<div id=\"tl_buttons\"><?= \$this->back ?></div>

\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>

\t<div class=\"content_wrapper form_wrapper\">

\t\t<div class=\"counter\"><?= sprintf(\$GLOBALS['TL_LANG']['page_grid_preset']['counter'],count(\$this->elements)); ?></div>

\t\t<div class=\"inside grid_wrapper grid_size_<?= \$this->columnCount; ?>\">
\t\t\t<?php foreach(\$this->columns as \$category => \$arrColumns): ?>
\t\t\t<div class=\"category <?= \$category; ?> block\">
\t\t\t\t<h2><?= \$GLOBALS['TL_LANG']['page_grid_preset']['categories'][\$category] ?: \$category; ?></h2>

\t\t\t\t<div class=\"items\">
\t\t\t\t\t<?php foreach(\$arrColumns as \$index => \$arrElements): ?>
\t\t\t\t\t<div class=\"item item_<?= \$index; ?> size_<?= \$this->columnCount; ?>\">
\t\t\t\t\t\t<?php foreach(\$arrElements as \$i => \$data): ?>
\t\t\t\t\t\t<div id=\"<?= \$data['name']; ?>\" class=\"<?= \$data['class']; ?> block\">
\t\t\t\t\t\t\t<div class=\"inside\">
\t\t\t\t\t\t\t\t<?php 
\t\t\t\t\t\t\t\t\$label = \$data['label'];
\t\t\t\t\t\t\t\tif( \$data['config']['grid']['desktop'] )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$label = \$data['config']['grid']['desktop'];
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\tif( \$GLOBALS['TL_LANG']['autogrid_grid'][ \$data['name'] ] )
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\t\$label = \$GLOBALS['TL_LANG']['autogrid_grid'][ \$data['name'] ];
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t?>
\t\t\t\t\t\t\t\t<div class=\"label\"><?= \$label; ?></div>

\t\t\t\t\t\t\t\t<!-- grid preview -->
\t\t\t\t\t\t\t\t<div class=\"grid_preview autogrid_grid <?= 'd_'.\$data['name']; ?>\">
\t\t\t\t\t\t\t\t\t<?php foreach(explode('_',\$data['name']) as \$i => \$pct): ?>
\t\t\t\t\t\t\t\t\t<div class=\"column\"><div class=\"attribute\">&nbsp;</div></div>
\t\t\t\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<form action=\"<?= \$this->action; ?>\" id=\"form_<?= \$data['name']; ?>\" class=\"tl_form hidden\" method='post'>
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"GRID_PRESET\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= Controller::request_token(); ?>\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"ELEMENT\" value=\"<?= \$data['name']; ?>\">
\t\t\t\t\t\t\t</form>

\t\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t// submit form
\t\t\t\t\t\t\twindow.addEvent('domready', function()
\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\$\$('#<?= \$data['name']; ?>').addEvent('click', function()
\t\t\t\t\t\t\t\t{
\t\t\t\t\t\t\t\t\tdocument.getElementById('form_<?= \$data['name']; ?>').submit();
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t</script>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t\t</div>
\t\t\t\t\t<?php endforeach; ?>
\t\t\t\t</div>


\t\t\t\t<div class=\"clear\"></div>
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t</div>
\t\t<div class=\"clear\"></div>
\t</div>
</div>
", "@pct_autogrid/backend/be_page_grid_preset.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_autogrid/templates/backend/be_page_grid_preset.html5");
    }
}
