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

/* @pct_theme_templates/customelements/customelement_textlink.html5 */
class __TwigTemplate_277eff40d19735bc873f8ea829b1f085 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_textlink.css|static';

\$element = \$this->field('markup')->value();
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}
?>
<<?= \$element; ?> class=\"<?=  \$this->class; ?> ce_textlink_<?= \$this->id;?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-color=\"<?php echo \$this->field('color')->value(); ?>\" data-style=\"<?php echo \$this->field('style')->value(); ?>\" data-align=\"<?php echo \$this->field('align')->value(); ?>\"<?php echo \$this->cssID; ?>>
\t<?php echo \$this->field('link')->html(); ?>
</<?= \$element; ?>>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_textlink.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_textlink.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_textlink.html5");
    }
}
