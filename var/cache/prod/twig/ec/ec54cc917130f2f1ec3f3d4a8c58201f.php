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

/* @pct_theme_templates/customelements/customelement_authorbox.html5 */
class __TwigTemplate_ce5b9055089e496da94bff77f096b1d1 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_authorbox.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('style')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_authorbox_inside\">
\t\t<?php echo \$this->field('image')->html(); ?>
\t\t<div class=\"ce_authorbox_content\">
\t\t\t<div class=\"name h5\"><?php echo \$this->field('name')->value(); ?></div>
\t\t\t<?php if(\$this->field('subtitle')->value()): ?><div class=\"subtitle\"><?php echo \$this->field('subtitle')->html(); ?></div><?php endif; ?>
\t\t\t<?php echo \$this->field('text')->html(); ?>
\t\t\t<?php if(\$this->field('link')->value()): ?><div class=\"link\"><?php echo \$this->field('link')->html(); ?></div><?php endif; ?>
\t\t</div>
\t</div>
\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_authorbox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_authorbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_authorbox.html5");
    }
}
