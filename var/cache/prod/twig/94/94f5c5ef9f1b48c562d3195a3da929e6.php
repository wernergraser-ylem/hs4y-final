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

/* @pct_theme_templates/elements/ce_autogrid_col.html5 */
class __TwigTemplate_f1f0c0ef1639dc5ca1c8d2474d87fd36 extends Template
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
        yield "<?php if(isset(\$this->AutoGrid->start)): ?>
<?php // sticky offset 
if( \$this->AutoGrid->sticky && isset(\$this->autogrid_sticky_offset) && !empty(\$this->autogrid_sticky_offset) )
{
\t\$this->AutoGrid->styles[] = 'top:'.\$this->autogrid_sticky_offset.';';
}
// theme related
\$classes = explode(' ', \$this->class ?? '');
if( isset(\$this->color_css) )
{
\t\$classes[] = \$this->color_css;
}
if( isset(\$this->bgcolor_css) )
{
\t\$classes[] = \$this->bgcolor_css;
}
\$this->class = implode(' ', \\array_filter(\$classes) );
?>
<div <?= \$this->cssID ?> class=\"column<?php if(\$this->class): ?> <?= \$this->class; ?><?php endif; ?><?php if(\$this->AutoGrid->classes): ?> <?= \$this->AutoGrid->classes; ?><?php endif; ?>\"<?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?>>
\t<div class=\"attributes<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?> has-image empty<?php endif; ?><?php if(\$this->autogrid_padding_css): ?> <?= \$this->autogrid_padding_css; ?><?php endif; ?>\"<?php if(\$this->AutoGrid->styles): ?> style=\"<?= implode(' ', \$this->AutoGrid->styles); ?>\"<?php endif; ?><?= \$this->AutoGrid->attributes; ?>>
\t\t<?php if(isset(\$this->AutoGrid->shstart) && \$this->AutoGrid->shstart === true): ?>
\t\t\t<div class=\"same-height-wrap\">
\t\t<?php endif; ?>
\t<?php if(\$this->AutoGrid->Image && !\$this->AutoGrid->hasContent): ?>
\t\t<figure class=\"image_container image_mob\"><?php \$this->insert('picture_default', \$this->AutoGrid->Image->picture); ?></figure>
\t<?php endif; ?>
<?php endif; ?>
<?php if(isset(\$this->AutoGrid->stop)): ?>
\t</div>
\t<?php if(isset(\$this->AutoGrid->shstop) && \$this->AutoGrid->shstop === true): ?>
\t\t</div>
\t<?php endif; ?>
</div>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/elements/ce_autogrid_col.html5";
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
        return new Source("", "@pct_theme_templates/elements/ce_autogrid_col.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/elements/ce_autogrid_col.html5");
    }
}
