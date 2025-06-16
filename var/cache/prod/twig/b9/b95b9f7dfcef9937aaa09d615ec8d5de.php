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

/* @pct_theme_templates/customelements/customelement_slide_in_start.html5 */
class __TwigTemplate_34d250203ec48006b6804c4d8119f2fa extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_slide_in.css';
\$GLOBALS['CE_SLIDE_IN_START'] = \$this->id;
?>

<div class=\"<?= \$this->class; ?>\"<?php echo \$this->cssID; ?>>
\t<div data-slide_in=\"<?= \$this->id; ?>\" data-direction=\"<?php echo \$this->field('slide_in_direction')->value(); ?>\" data-width=\"<?php echo \$this->field('slide_in_width')->value(); ?>\" class=\"slide-in-container\" id=\"ce_slide_in_<?= \$this->id; ?>\">
\t\t<div class=\"slide_in_wrapper init\">\t\t
\t\t\t<div class=\"visible_content\">
\t\t\t\t<div class=\"content\">";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_slide_in_start.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_slide_in_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_slide_in_start.html5");
    }
}
