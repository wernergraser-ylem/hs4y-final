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

/* @pct_theme_templates/customelements/customelement_timeline.html5 */
class __TwigTemplate_5e9dadcf43a032acf3ad5919c3c3da17 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_timeline.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
<?php if( !empty(\$this->group('section')) ): ?>
\t<?php foreach(\$this->group('section') as \$i => \$fields): ?>
\t<div class=\"timeline-item<?php if(\$this->field('icon#'.\$i)->value()): ?> timeline-w-icon<?php endif; ?>\">\t
\t\t
\t\t<i <?php if(\$this->field('icon#'.\$i)->value()): ?>class=\"timeline-icon <?php echo \$this->field('icon#'.\$i)->value(); ?>\"<?php endif; ?>></i>
\t
\t\t<?php if(\$this->field('title#'.\$i)->value()): ?>
\t\t<div class=\"timeline-item-title\"><?php echo \$this->field('title#'.\$i)->value(); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<div class=\"timeline-item-text\"><?php echo \$this->field('text#'.\$i)->html(); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('image#'.\$i)->value()): ?>
\t\t<div class=\"timeline-item-image\"><?php echo \$this->field('image#'.\$i)->html(); ?></div>
\t\t<?php endif; ?>
\t\t\t
\t</div>\t
\t<?php endforeach; ?>
\t<i class=\"last-point\"></i>
<?php endif; ?>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_timeline.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_timeline.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_timeline.html5");
    }
}
