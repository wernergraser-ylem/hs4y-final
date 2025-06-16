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

/* @pct_theme_templates/customelements/customelement_timeline_content.html5 */
class __TwigTemplate_95e42deeece21750448564e89a1e5f94 extends Template
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
        yield "<div class=\"timeline-item<?php if(\$this->field('icon')->value()): ?> timeline-w-icon<?php endif; ?>\">\t
\t<i <?php if(\$this->field('icon')->value()): ?>class=\"timeline-icon <?php echo \$this->field('icon')->value(); ?>\"<?php endif; ?>></i>
\t
\t\t<?php if(\$this->field('title')->value()): ?>
\t\t<div class=\"timeline-item-title\"><?php echo \$this->field('title')->value(); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('text')->value()): ?>
\t\t<div class=\"timeline-item-text\"><?php echo \$this->field('text')->html(); ?></div>
\t\t<?php endif; ?>
\t\t
\t\t<?php if(\$this->field('image')->value()): ?>
\t\t<div class=\"timeline-item-image\"><?php echo \$this->field('image')->html(); ?></div>
\t\t<?php endif; ?>\t\t
</div>\t";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_timeline_content.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_timeline_content.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_timeline_content.html5");
    }
}
