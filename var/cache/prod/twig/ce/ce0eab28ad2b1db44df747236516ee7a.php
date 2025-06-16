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

/* @pct_theme_templates/event/event_list_v4.html5 */
class __TwigTemplate_595805c65e21efcb01205e571b14ba8f extends Template
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
\$date = new \\Contao\\Date(\$this->firstDate);
\$newtime = \$date->tstamp ?: \$this->startDate; 
?>
<div class=\"autogrid_wrapper block event layout_list<?php if(\$this->classList): ?> <?= \$this->classList ?><?php endif; ?>\" itemscope itemtype=\"http://schema.org/Event\">
\t\t<i class=\"fa fa-location-arrow\"></i>
\t<div class=\"autogrid one_sixth block date\">
\t\t<?php echo \\Contao\\Date::parse(\"d\", \$newtime); ?> <?php echo \\Contao\\Date::parse(\"M\", \$newtime); ?> <?php echo \\Contao\\Date::parse(\"Y\", \$newtime); ?>
\t</div>
\t
\t<div class=\"autogrid three_sixth block title\">
\t\t<a href=\"<?= \$this->href ?>\" itemprop=\"url\" title=\"<?= \$this->title ?> (<?php if (\$this->day) echo \$this->day . ', '; ?><?= \$this->date ?><?php if (\$this->time) echo ', ' . \$this->time; ?>)\"<?= \$this->target ?>><?= \$this->link ?></a>
\t</div>
\t\t
\t<div class=\"autogrid one_sixth block location\">
\t\t<?php if (\$this->location): ?>
    \t\t<?= \$this->locationLabel ?>: <?= \$this->location ?>
  \t\t<?php endif; ?>
\t</div>
\t
\t<div class=\"autogrid one_sixth block time\" itemprop=\"startDate\">
\t\t<?php if (\$this->time): ?><i class=\"fa fa-clock-o\"></i><?= \$this->time ?><?php else: ?>&nbsp;<?php endif; ?>
\t</div>
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
        return "@pct_theme_templates/event/event_list_v4.html5";
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
        return new Source("", "@pct_theme_templates/event/event_list_v4.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/event_list_v4.html5");
    }
}
