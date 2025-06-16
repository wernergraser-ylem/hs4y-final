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

/* @pct_theme_templates/event/event_teaser_v1.html5 */
class __TwigTemplate_306b23d7ca635adec053f063d3e6a1a2 extends Template
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/parallax/jquery.stellar.min.js|static';
\$date = new \\Contao\\Date(\$this->firstDate);
\$newtime = \$date->tstamp ?: \$this->startDate; 
?>
<div class=\"block event pt-l pb-l layout_list<?php if(\$this->classList): ?> <?= \$this->classList ?><?php endif; ?>\" style=\"background-image: url(<?= \$this->src; ?>)\" data-stellar-background-ratio=\"0.1\" data-stellar-offset-parent=\"true\" itemscope itemtype=\"http://schema.org/Event\">
\t<div class=\"event-overlay\"></div>
\t\t<div class=\"event-content\">
\t\t\t<?php if (\$this->date): ?>
\t\t\t<div class=\"day font-size-s\" itemprop=\"startDate\">
\t\t\t\t<?php echo \\Contao\\Date::parse(\"l\", \$newtime); ?>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"date font-size-xs mb-xs\">
\t\t\t\t<?php echo \\Contao\\Date::parse(\"d\", \$newtime); ?>/<?php echo \\Contao\\Date::parse(\"m\", \$newtime); ?>/<?php echo \\Contao\\Date::parse(\"Y\", \$newtime); ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<div class=\"title h3 font-size-xl\">
\t\t\t\t<a href=\"<?= \$this->href ?>\" title=\"<?= \$this->title ?> (<?php if (\$this->day) echo \$this->day . ', '; ?><?= \$this->date ?><?php if (\$this->time) echo ', ' . \$this->time; ?>)\"<?= \$this->target ?>><?= \$this->link ?></a>
\t\t\t</div>
\t\t\t
\t\t\t<?php if (\$this->teaser): ?>
\t\t\t<div class=\"teaser font-size-xs\" itemprop=\"description\">
\t\t\t\t<?= \$this->teaser ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->location): ?>
\t\t\t<div class=\"location font-size-xs\">
\t\t\t\t<?= \$this->location ?>
\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->hasDetails): ?>
\t\t\t\t<div class=\"ce_hyperlink mt-m\">
\t\t\t\t\t<a href=\"<?= \$this->href ?>\" itemprop=\"url\" class=\"link-white outline\" title=\"<?= \$this->readMore ?>\"<?= \$this->target ?>><?= \$this->more ?></a>
\t\t\t\t</div>
\t\t\t<?php endif; ?>
\t\t</div>
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/event/event_teaser_v1.html5";
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
        return new Source("", "@pct_theme_templates/event/event_teaser_v1.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/event_teaser_v1.html5");
    }
}
