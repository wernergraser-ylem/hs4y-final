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

/* @pct_theme_templates/customelements/customelement_iconbox.html5 */
class __TwigTemplate_c90a1867519e5ff0b93930711ff13e78 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_iconbox.css|static';
\$bgcolor = '';
if( \$this->field('bgcolor')->value() )
{
\t// compile color
\t\$color = \$this->field('bgcolor')->attribute()->compileColor( \$this->field('bgcolor')->value() );
\t\$bgcolor = \$color->rgba;
}
\$color = '';
if( \$this->field('color')->value() )
{
\t// compile color
\t\$color = \$this->field('color')->attribute()->compileColor( \$this->field('color')->value() );
\t\$color = \$color->rgba;
}
\$lightbox = \$this->field('link')->option('lightbox');
if( \$this->field('link')->option('lightbox') )
{
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox=\"'.\$lightbox.'\"';
\t}\t
\tif( strpos(\$this->field('link')->option('lightbox'), 'data-lightbox-iframe') !== false )
\t{
\t\t\$lightbox = \$this->field('link')->option('lightbox');
\t\t\$lightbox = str_replace('data-', '',\$lightbox);\t
\t\t\$lightbox = ' data-lightbox-iframe=\"'.\$lightbox.'\"';
\t}
}
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('schema')->value(); ?><?php if(\$this->field('padding')->value()): ?> padding<?php endif; ?><?php if(\$this->field('border-radius')->value()): ?> border-radius<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_iconbox_outside<?php if(\$this->field('padding')->value()): ?> padding<?php endif; ?>\" style=\"<?php if(\$bgcolor): ?>background-color:<?= \$bgcolor; ?>;<?php endif; ?><?php if(\$this->field('height')->value()): ?> min-height:<?php echo \$this->field('height')->value(); ?>px;<?php endif; ?>\">
\t\t<div class=\"ce_iconbox_inside\">
\t\t\t<div class=\"ce_iconbox_icon\">
\t\t\t\t<?php if(\$this->field('link')->value()): ?>
\t\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?= \$lightbox; ?><?php endif; ?>>
\t\t\t\t<?php endif; ?>
\t\t\t\t<?php if(\$this->field('image-icon')->value()): ?>
\t\t\t\t<?php echo \$this->field('image-icon')->html(); ?>
\t\t\t\t<?php endif; ?>
\t\t\t\t<?php if(\$this->field('icon')->value()): ?>
\t\t\t\t<i class=\"<?php echo \$this->field('icon')->value(); ?>\"<?php if(\$color): ?> style=\"color:<?= \$color; ?>\"<?php endif; ?>></i>
\t\t\t\t<?php endif; ?>
\t\t\t\t<?php if(\$this->field('link')->value()): ?></a><?php endif; ?>
\t\t\t</div>
\t\t\t<?php if(\$this->field('headline')->value() || \$this->field('link')->value() || \$this->field('text')->value() ): ?>
\t\t\t<div class=\"ce_iconbox_cwrapper\"<?php if(\$color): ?> style=\"color:<?= \$color; ?>\"<?php endif; ?>>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('headline')->value()): ?>
\t\t\t<?php if(\$this->field('link')->value()): ?><a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?= \$lightbox; ?><?php endif; ?>><?php endif; ?>
\t\t\t<<?php if(\$this->field('headline_typ')->value()): ?><?php echo \$this->field('headline_typ')->value(); ?><?php else: ?>h3<?php endif; ?> class=\"headline\"<?php if(\$color): ?> style=\"color:<?= \$color; ?>\"<?php endif; ?>><?php echo \$this->field('headline')->value(); ?></<?php if(\$this->field('headline_typ')->value()): ?><?php echo \$this->field('headline_typ')->value(); ?><?php else: ?>h3<?php endif; ?>>
\t\t\t<?php if(\$this->field('link')->value()): ?></a><?php endif; ?>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('text')->value()): ?>
\t\t\t<div class=\"content\"><?php echo \$this->field('text')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('linktext')->value()): ?>
\t\t\t<a href=\"<?php echo \$this->field('link')->value(); ?>\"<?php if(\$this->field('link')->option('target')): ?> target=\"_blank\"<?php endif; ?> class=\"link\"<?php if(\$color): ?> style=\"color:<?= \$color; ?>\"<?php endif; ?><?php if(\$this->field('link')->option('lightbox')): ?><?= \$lightbox; ?><?php endif; ?>><?php echo \$this->field('linktext')->value(); ?></a>
\t\t\t<?php endif; ?>
\t\t\t<?php if(\$this->field('headline')->value() || \$this->field('link')->value() || \$this->field('text')->value() ): ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
\t</div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_iconbox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_iconbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_iconbox.html5");
    }
}
