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

/* @pct_revolutionslider/ce_revolutionslider_image.html5 */
class __TwigTemplate_bae6b52a7a051f5e0b67942b0573a464 extends Template
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
\$svg = '';
\$rootDir = \\Contao\\System::getContainer()->getParameter('kernel.project_dir');
if( \$this->useSVG && file_exists(\$rootDir .'/'.\$this->src) && strtolower( pathinfo(\$this->src, PATHINFO_EXTENSION) ) == 'svg' )
{
\t\$svg = file_get_contents(\$rootDir .'/'.\$this->src);
}
?>

<?php if(\$this->href): ?>
<a class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?> href=\"<?= \$this->href; ?>\"<?php if (\$this->linkTitle): ?> title=\"<?= \$this->linkTitle; ?>\"<?php endif; ?><?= \$this->attributes; ?>>
<?php else: ?>\t
<div class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
<?php endif; ?>
\t<?php if(strlen(\$svg) > 0): ?>
\t
\t<?= \$svg; ?>
\t<img id=\"rs_image_<?= \$this->id; ?>\" src=\"<?= \$this->src; ?>\" class=\"hidden tp-resizeme\">
\t<script>
\t/* <![CDATA[ */

\tjQuery(window).bind('ready resize', function() 
\t{
\t\tvar img = jQuery('#rs_image_<?= \$this->id; ?>');
\t\tjQuery('#rs_image_<?= \$this->id; ?>').siblings('svg').height( img.height() ) ;
\t\tjQuery('#rs_image_<?= \$this->id; ?>').siblings('svg').width( img.width() ) ;
\t});

\t/* ]]> */
\t</script>

\t<?php else: ?>
\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t<?php endif; ?>
<?php if(\$this->href): ?>
</a>
<?php else: ?>\t
</div>
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_revolutionslider/ce_revolutionslider_image.html5";
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
        return new Source("", "@pct_revolutionslider/ce_revolutionslider_image.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_revolutionslider/templates/ce_revolutionslider_image.html5");
    }
}
