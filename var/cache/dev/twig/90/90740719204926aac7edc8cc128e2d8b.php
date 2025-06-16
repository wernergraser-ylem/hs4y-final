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

/* @pct_theme_templates/event/event_list_timeline.html5 */
class __TwigTemplate_ba790f1d15f0947aff4d830a7e8a8b92 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_list_timeline.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_list_timeline.html5"));

        // line 1
        yield "<div class=\"timeline_item\" data-timeline_date=\"<?php echo \\Contao\\Date::parse(\"d/m/Y\",\$this->begin); ?>\" itemscope itemtype=\"http://schema.org/Event\">
\t<div class=\"event block<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\">
\t\t<div class=\"event-content\">
\t\t\t
\t\t\t<div class=\"h3\"><?= \$this->title ?></div>
\t\t\t
\t\t\t<div class=\"info\">
\t\t\t\t<time datetime=\"<?= \$this->date ?>\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
\t\t\t\t<?php if (\$this->location): ?>
\t\t\t\t<div class=\"location\"><?= \$this->locationLabel ?>: <?= \$this->location ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t
\t\t\t<div class=\"ce_text block\" itemprop=\"description\">
\t\t\t\t<?php if(\$this->teaser): ?><?= \$this->teaser ?><?php endif; ?>
\t\t\t</div>
\t\t\t
\t\t\t<?php if (\$this->enclosure): ?>
\t\t    <div class=\"enclosure\">
\t\t      <?php foreach (\$this->enclosure as \$enclosure): ?>
\t\t        <p><?= \\Contao\\Image::getHtml(\$enclosure['icon'], '', 'class=\"mime_icon\"') ?> <a href=\"<?= \$enclosure['href'] ?>\" title=\"<?= \$enclosure['title'] ?>\"><?= \$enclosure['link'] ?> <span class=\"size\">(<?= \$enclosure['filesize'] ?>)</span></a></p>
\t\t      <?php endforeach; ?>
\t\t    </div>
\t\t  <?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->hasDetails): ?>
\t   \t\t <div class=\"more\"><a href=\"<?= \$this->href ?>\" title=\"<?= \$this->readMore ?>\"<?= \$this->target ?> itemprop=\"url\"><?= \$this->more ?></a></div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t</div>
\t\t
\t\t<?php if (\$this->addImage): ?>
\t\t<div class=\"image_container\">
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t</div>
\t\t<?php endif; ?>
\t</div>\t
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/event/event_list_timeline.html5";
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
        return new Source("<div class=\"timeline_item\" data-timeline_date=\"<?php echo \\Contao\\Date::parse(\"d/m/Y\",\$this->begin); ?>\" itemscope itemtype=\"http://schema.org/Event\">
\t<div class=\"event block<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\">
\t\t<div class=\"event-content\">
\t\t\t
\t\t\t<div class=\"h3\"><?= \$this->title ?></div>
\t\t\t
\t\t\t<div class=\"info\">
\t\t\t\t<time datetime=\"<?= \$this->date ?>\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
\t\t\t\t<?php if (\$this->location): ?>
\t\t\t\t<div class=\"location\"><?= \$this->locationLabel ?>: <?= \$this->location ?></div>
\t\t\t\t<?php endif; ?>
\t\t\t</div>
\t
\t\t\t<div class=\"ce_text block\" itemprop=\"description\">
\t\t\t\t<?php if(\$this->teaser): ?><?= \$this->teaser ?><?php endif; ?>
\t\t\t</div>
\t\t\t
\t\t\t<?php if (\$this->enclosure): ?>
\t\t    <div class=\"enclosure\">
\t\t      <?php foreach (\$this->enclosure as \$enclosure): ?>
\t\t        <p><?= \\Contao\\Image::getHtml(\$enclosure['icon'], '', 'class=\"mime_icon\"') ?> <a href=\"<?= \$enclosure['href'] ?>\" title=\"<?= \$enclosure['title'] ?>\"><?= \$enclosure['link'] ?> <span class=\"size\">(<?= \$enclosure['filesize'] ?>)</span></a></p>
\t\t      <?php endforeach; ?>
\t\t    </div>
\t\t  <?php endif; ?>
\t\t\t
\t\t\t<?php if (\$this->hasDetails): ?>
\t   \t\t <div class=\"more\"><a href=\"<?= \$this->href ?>\" title=\"<?= \$this->readMore ?>\"<?= \$this->target ?> itemprop=\"url\"><?= \$this->more ?></a></div>
\t\t\t<?php endif; ?>
\t\t\t
\t\t</div>
\t\t
\t\t<?php if (\$this->addImage): ?>
\t\t<div class=\"image_container\">
\t\t\t<?php \$this->insert('picture_default', \$this->picture); ?>
\t\t</div>
\t\t<?php endif; ?>
\t</div>\t
</div>", "@pct_theme_templates/event/event_list_timeline.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/event_list_timeline.html5");
    }
}
