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

/* @pct_theme_templates/customelements/customelement_image_collage_3pics.html5 */
class __TwigTemplate_2a6e94265970f5840dc33422f2e822d7 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_collage_3pics.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';
?>
<div class=\"<?php echo \$this->class; ?> ce_image_collage_3pics_<?= \$this->id; ?> <?php echo \$this->field('style')->value(); ?>\" data-animation=\"<?php echo \$this->field('animation')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"image_1\">
\t\t<?php echo \$this->field('image_1')->html(); ?>
\t</div>
\t<div class=\"image_2\">
\t\t<?php echo \$this->field('image_2')->html(); ?>
\t</div>
\t<div class=\"image_3\">
\t\t<?php echo \$this->field('image_3')->html(); ?>
\t</div>
</div>
<script>
jQuery(document).ready(function() 
{
\t// define waypoint
\tvar selector = '.ce_image_collage_3pics_<?= \$this->id; ?>';
\tvar waypoint = EX.fx.waypoint(selector);
\t
\t// define event listener and start effect
\tjQuery(selector).on('intersecting', function(e, params) 
\t{
\t\tjQuery(this).addClass('in-viewport'); 
\t});
});
</script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_image_collage_3pics.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_image_collage_3pics.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_image_collage_3pics.html5");
    }
}
