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

/* @pct_theme_templates/customelements/customelement_customfont.html5 */
class __TwigTemplate_46f8758cb15f482877f17b85561a5952 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_customfont.css|static';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
if (\$this->field('font_size')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_customfont_\" . \$this->id  . \",.ce_customfont_\" . \$this->id  . \" p{font-size:\" . \$this->field('font_size')->value() . \"!important}</style>\";
}

if (\$this->field('line_height')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>.ce_customfont_\" . \$this->id  . \",.ce_customfont_\" . \$this->id  . \" p{line-height:\" . \$this->field('line_height')->value() . \"!important}</style>\";
}

if (\$this->field('font_size_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_customfont_\" . \$this->id  . \",.ce_customfont_\" . \$this->id  . \" p{font-size:\" . \$this->field('font_size_mob')->value() . \"!important}}</style>\";
}

if (\$this->field('line_height_mob')->value()) {
\t\$GLOBALS['TL_HEAD'][] = \"<style>@media only screen and (max-width: 767px) {.ce_customfont_\" . \$this->id  . \",.ce_customfont_\" . \$this->id  . \" p{line-height:\" . \$this->field('line_height_mob')->value() . \"!important}}</style>\";
}
?>

<<?= \$element; ?> class=\"<?= \$this->class; ?> ce_customfont_<?= \$this->id;?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-font=\"<?= \$this->field('font')->value(); ?>\">
\t<?= \$this->field('text')->value(); ?>
</<?= \$element; ?>>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_customfont.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_customfont.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_customfont.html5");
    }
}
