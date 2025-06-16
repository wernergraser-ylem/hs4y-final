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

/* @pct_theme_templates/event/event_list_v3.html5 */
class __TwigTemplate_e05d71c61d0c71f020fa872e7c44565c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_list_v3.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_list_v3.html5"));

        // line 1
        yield "<?php 
\$date = new \\Contao\\Date(\$this->firstDate);
\$newtime = \$date->tstamp ?: \$this->startDate; 
?>

<div class=\"item block autogrid one_third isotope-item<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\" itemscope itemtype=\"http://schema.org/Event\">
\t<div class=\"item-inside\">
\t\t<div class=\"image_container\">
\t\t\t<?php if (\$this->hasDetails): ?><a href=\"<?= \$this->href; ?>\" itemprop=\"url\"><?php endif; ?>
\t\t\t<?php if (\$this->addImage): ?><?php \$this->insert('picture_default', \$this->picture); ?><?php endif; ?>
\t\t\t<?php if (\$this->hasDetails): ?></a><?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if (\$this->date): ?>
\t\t<div class=\"date bg-accent\" itemprop=\"startDate\">
\t\t\t<span class=\"day\"><?php echo \\Contao\\Date::parse(\"d\", \$newtime); ?></span>
\t\t\t<span class=\"month\"><?php echo \\Contao\\Date::parse(\"M\", \$newtime); ?></span>
\t\t\t<span class=\"year\"><?php echo \\Contao\\Date::parse(\"Y\", \$newtime); ?></span>
\t\t</div>
\t\t<?php endif; ?>
\t\t\t
\t\t<?php if (\$this->location): ?>
\t    <div class=\"location\">
\t    \t<i class=\"fa fa-location-arrow\"></i><?= \$this->locationLabel ?>: <?= \$this->location ?>
\t    </div>
\t\t<?php endif; ?>
\t\t\t
\t\t<div class=\"content\">
\t\t\t<div class=\"h4\"><a href=\"<?= \$this->href ?>\" itemprop=\"url\" title=\"<?= \$this->title ?> (<?php if (\$this->day) echo \$this->day . ', '; ?><?= \$this->date ?><?php if (\$this->time) echo ', ' . \$this->time; ?>)\"<?= \$this->target ?>><?= \$this->link ?></a></div>
\t\t\t<div class=\"meta-info\">
\t\t\t\t<i class=\"fa fa-calendar\"></i><time datetime=\"<?= \$this->datetime ?>\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
\t\t\t\t
\t\t\t\t<?php if (\$this->recurring): ?>
\t   \t\t\t <div class=\"recurring\"><?= \$this->recurring ?><?php if (\$this->until) echo ' ' . \$this->until; ?>.</div>
\t  \t\t\t<?php endif; ?>

\t\t\t</div>
\t\t</div>
\t\t
\t</div>
</div>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/event/event_list_v3.html5";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?php 
\$date = new \\Contao\\Date(\$this->firstDate);
\$newtime = \$date->tstamp ?: \$this->startDate; 
?>

<div class=\"item block autogrid one_third isotope-item<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\" itemscope itemtype=\"http://schema.org/Event\">
\t<div class=\"item-inside\">
\t\t<div class=\"image_container\">
\t\t\t<?php if (\$this->hasDetails): ?><a href=\"<?= \$this->href; ?>\" itemprop=\"url\"><?php endif; ?>
\t\t\t<?php if (\$this->addImage): ?><?php \$this->insert('picture_default', \$this->picture); ?><?php endif; ?>
\t\t\t<?php if (\$this->hasDetails): ?></a><?php endif; ?>
\t\t</div>
\t\t
\t\t<?php if (\$this->date): ?>
\t\t<div class=\"date bg-accent\" itemprop=\"startDate\">
\t\t\t<span class=\"day\"><?php echo \\Contao\\Date::parse(\"d\", \$newtime); ?></span>
\t\t\t<span class=\"month\"><?php echo \\Contao\\Date::parse(\"M\", \$newtime); ?></span>
\t\t\t<span class=\"year\"><?php echo \\Contao\\Date::parse(\"Y\", \$newtime); ?></span>
\t\t</div>
\t\t<?php endif; ?>
\t\t\t
\t\t<?php if (\$this->location): ?>
\t    <div class=\"location\">
\t    \t<i class=\"fa fa-location-arrow\"></i><?= \$this->locationLabel ?>: <?= \$this->location ?>
\t    </div>
\t\t<?php endif; ?>
\t\t\t
\t\t<div class=\"content\">
\t\t\t<div class=\"h4\"><a href=\"<?= \$this->href ?>\" itemprop=\"url\" title=\"<?= \$this->title ?> (<?php if (\$this->day) echo \$this->day . ', '; ?><?= \$this->date ?><?php if (\$this->time) echo ', ' . \$this->time; ?>)\"<?= \$this->target ?>><?= \$this->link ?></a></div>
\t\t\t<div class=\"meta-info\">
\t\t\t\t<i class=\"fa fa-calendar\"></i><time datetime=\"<?= \$this->datetime ?>\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
\t\t\t\t
\t\t\t\t<?php if (\$this->recurring): ?>
\t   \t\t\t <div class=\"recurring\"><?= \$this->recurring ?><?php if (\$this->until) echo ' ' . \$this->until; ?>.</div>
\t  \t\t\t<?php endif; ?>

\t\t\t</div>
\t\t</div>
\t\t
\t</div>
</div>

", "@pct_theme_templates/event/event_list_v3.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/event_list_v3.html5");
    }
}
