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

/* @pct_theme_templates/modules/mod_eventlist_v2.html5 */
class __TwigTemplate_4afbfdcb6c933d93b61a3f302f1fe543 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/events/mod_eventlist_v2.css|static';
\$classes = \\array_filter( \\array_merge( \\explode(' ',\$this->class), explode(' ',\$this->origCssID[1] ?? '') ) );
\$classes[] = 'mod_eventlist_v2';
\$classes = \\array_unique(\$classes);
?>

<div <?php if(\$this->cssID): ?><?= \$this->cssID; ?><?php endif; ?> class=\"<?= implode(' ',\$classes); ?>\">
<?php \$this->block('content'); ?>
  <?= \$this->events ?>
  <?= \$this->pagination ?>
<?php \$this->endblock(); ?>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_eventlist_v2.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_eventlist_v2.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_eventlist_v2.html5");
    }
}
