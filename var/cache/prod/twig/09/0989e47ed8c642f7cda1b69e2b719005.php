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

/* @pct_themer/themedesigner/themedesigner_quickinfo.html5 */
class __TwigTemplate_2596faf9ef0e0071c82a1034e437cfb1 extends Template
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
        // line 1
        yield "<?php 
/**
 * ThemeDesigner Quickinfo
 */
?>

<!-- indexer::stop -->

<div id=\"themedesigner_quickinfo\" class=\"themedesigner_quickinfo\">
<a class=\"trigger\" title=\"<?= \$GLOBALS['TL_LANG']['pct_themedesigner']['quickinfo_title']; ?>\"></a>
<div class=\"content\">
<div class=\"content_inside\">
<div class=\"theme\"><?= \$this->theme; ?></div>

<?php if(count(\$this->elements) > 0): ?>
<ul class=\"elements\">
\t<?php foreach(\$this->elements as \$selector => \$arrElement): ?>
\t<li data-td_selector=\"<?= \$selector; ?>\" class=\"sibling <?= \$arrElement['class']; ?>\">
\t\t<span class=\"label\"><?= \$arrElement['label']; ?></span>
\t\t<span class=\"seperator\">:</span>
\t\t<span class=\"value\"><?= \$arrElement['value']; ?></span>
\t</li>
\t<?php endforeach; ?>
</ul>
<?php endif; ?>

</div>
</div>
</div>

<?php if(count(\$this->elements) > 0): ?>
<script>
/* <![CDATA[ */
jQuery(document).ready(function()
{
\t<?php foreach(\$this->elements as \$selector => \$arrElement): ?>
\tvar objSwitch = jQuery('[data-switch=\"<?= \$arrElement['switch']; ?>\"]');
\tif(objSwitch)
\t{
\t\tobjSwitch.on('ThemeDesigner.onToggleSwitch',function(event,params)
\t\t{
\t\t\tvar objQuickinfoElement = jQuery('#themedesigner_quickinfo li[data-td_selector=\"<?= \$selector; ?>\"]');
\t\t\tif(params.status < 1)
\t\t\t{
\t\t\t\t// hide
\t\t\t\tobjQuickinfoElement.addClass('hidden');
\t\t\t\t// remove the value
\t\t\t\tobjQuickinfoElement.find('.value').html('');
\t\t\t}
\t\t\telse
\t\t\t{
\t\t\t\t// show
\t\t\t\tobjQuickinfoElement.removeClass('hidden');
\t\t\t}\t
\t\t});
\t}
\t
\tjQuery(document).on('ThemeDesigner.onValue',function(event,params)
\t{
\t\tvar objQuickinfoElement = jQuery('#themedesigner_quickinfo li[data-td_selector=\"<?= \$selector; ?>\"]');
\t\tif(params.name == '<?= \$selector; ?>')
\t\t{
\t\t\tobjQuickinfoElement.find('.value').html(params.value);
\t\t}
\t});
\t
\t
\t<?php endforeach; ?>
});
/* ]]> */
</script>
<?php endif; ?>
<!-- indexer::continue -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/themedesigner_quickinfo.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_themer/themedesigner/themedesigner_quickinfo.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/themedesigner_quickinfo.html5");
    }
}
