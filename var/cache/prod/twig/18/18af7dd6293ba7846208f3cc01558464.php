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

/* @pct_theme_templates/customelements/customelement_divider.html5 */
class __TwigTemplate_cf626e965c4f7f835b967e3bc90f6e90 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_divider.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('align')->value(); ?><?php if(\$this->field('invert')->value()): ?> invert<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t
\t<?php if(\$this->field('schema')->value() == 'version10'): ?>
\t
\t<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" width=\"98px\" height=\"8px\" viewBox=\"0 0 98 8\" enable-background=\"new 0 0 98 8\" xml:space=\"preserve\"> <rect width=\"2\" height=\"2\"/> <rect x=\"2\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"4\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"6\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"8\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"10\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"12\" width=\"2\" height=\"2\"/> <rect x=\"14\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"16\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"18\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"20\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"22\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"24\" width=\"2\" height=\"2\"/> <rect x=\"26\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"28\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"30\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"32\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"34\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"36\" width=\"2\" height=\"2\"/> <rect x=\"38\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"40\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"42\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"44\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"46\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"48\" width=\"2\" height=\"2\"/> <rect x=\"50\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"52\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"54\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"56\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"58\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"60\" width=\"2\" height=\"2\"/> <rect x=\"62\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"64\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"66\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"68\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"70\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"72\" width=\"2\" height=\"2\"/> <rect x=\"74\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"76\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"78\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"80\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"82\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"84\" width=\"2\" height=\"2\"/> <rect x=\"86\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"88\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"90\" y=\"6\" width=\"2\" height=\"2\"/> <rect x=\"92\" y=\"4\" width=\"2\" height=\"2\"/> <rect x=\"94\" y=\"2\" width=\"2\" height=\"2\"/> <rect x=\"96\" width=\"2\" height=\"2\"/> </svg>\t
\t
\t<?php else: ?>
\t
\t<span class=\"divider-one\"></span>
\t<span class=\"divider-two\"></span>
\t<span class=\"divider-three\"></span>
\t
\t<?php endif; ?>
\t
</div>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_divider.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_divider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_divider.html5");
    }
}
