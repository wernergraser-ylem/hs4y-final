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

/* @pct_theme_templates/customelements/customelement_image_extended.html5 */
class __TwigTemplate_556c16a791113243d1358feb32d7f03c extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_image_extended.css|static';
\$rootDir = \\Contao\\System::getContainer()->getParameter('kernel.project_dir');
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('frame')->value(); ?> <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('halign')->value(); ?><?php if(\$this->field('mob_align')->value()): ?> <?php echo \$this->field('mob_align')->value(); ?><?php endif; ?><?php if(\$this->field('hide_mobile')->value()): ?> hide_mobile<?php endif; ?><?php if(\$this->field('position_absolute')->value()): ?> position-absolute<?php endif; ?><?php if(\$this->field('parallax')->value()): ?> has-parallax <?php echo \$this->field('parallax_level')->value(); ?><?php endif; ?>\"<?php if(\$this->field('position_absolute')->value()): ?> style=\"<?php endif; ?><?php if(\$this->field('pos_top')->value()): ?> top:<?php echo \$this->field('pos_top')->value(); ?>;<?php endif; ?><?php if(\$this->field('pos_right')->value()): ?> right:<?php echo \$this->field('pos_right')->value(); ?>;<?php endif; ?><?php if(\$this->field('pos_bottom')->value()): ?> bottom:<?php echo \$this->field('pos_bottom')->value(); ?>;<?php endif; ?><?php if(\$this->field('pos_left')->value()): ?> left:<?php echo \$this->field('pos_left')->value(); ?>;<?php endif; ?><?php if(\$this->field('position_absolute')->value()): ?>\"<?php endif; ?><?php echo \$this->cssID; ?>>
\t<div class=\"ce_image_extended_inside\" style=\"<?php if(\$this->field('margin_right')->value()): ?> margin-right: <?php echo \$this->field('margin_right')->value(); ?>%;<?php endif; ?><?php if(\$this->field('margin_left')->value()): ?> margin-left: <?php echo \$this->field('margin_left')->value(); ?>%;<?php endif; ?>\">
\t\t<?php if(\$this->field('render_svg')->value()): ?>
\t\t<?php 
\t\t\$size = \\Contao\\StringUtil::deserialize( \$this->field('image')->option('size') );
\t\t\$strFile = \$this->field('image')->generate( \$size ?? array() );
\t\tif( \\file_exists(\$rootDir.'/'.\$strFile) )
\t\t{
\t\t\techo file_get_contents(\$strFile);
\t\t}
\t\t?>
\t\t<?php else: ?>
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<?php endif; ?>
\t</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_image_extended.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_image_extended.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_image_extended.html5");
    }
}
