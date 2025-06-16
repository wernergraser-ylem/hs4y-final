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

/* @pct_theme_templates/event/event_full.html5 */
class __TwigTemplate_07435fb54bf9599b13c02f7c0b7a623a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_full.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/event/event_full.html5"));

        // line 1
        yield "<div class=\"event layout_full block<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\" itemscope itemtype=\"http://schema.org/Event\">

  <div class=\"title h1\"><?= \$this->title ?></div>
  <div class=\"info\">
  \t<time datetime=\"<?= \$this->datetime ?>\" itemprop=\"startDate\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
  \t<?php if (\$this->location): ?>
    \t<p class=\"location\"><?= \$this->locationLabel ?>: <?= \$this->location ?></p>
\t<?php endif; ?>
  </div>
  <div class=\"clear\"></div>
  <?php if (\$this->recurring): ?>
    <p class=\"recurring\"><?= \$this->recurring ?><?php if (\$this->until) echo ' ' . \$this->until; ?>.</p>
  <?php endif; ?>

  <?php if (\$this->hasDetails): ?>
    <?= \$this->details ?>
  <?php else: ?>
    <div class=\"ce_text block\" itemprop=\"description\">
      <?= \$this->teaser ?>
    </div>
  <?php endif; ?>

  <?php if (\$this->enclosure): ?>
    <div class=\"enclosure\">
      <?php foreach (\$this->enclosure as \$enclosure): ?>
        <p><?= \\Contao\\Image::getHtml(\$enclosure['icon'], '', 'class=\"mime_icon\"') ?> <a href=\"<?= \$enclosure['href'] ?>\" title=\"<?= \$enclosure['title'] ?>\" itemprop=\"url\"><?= \$enclosure['link'] ?> <span class=\"size\">(<?= \$enclosure['filesize'] ?>)</span></a></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php
\$schemaOrg = \$this->getSchemaOrgData();
if( \$this->addImage && \$this->singleSRC )
{
\t\$schemaOrg['primaryImageOfPage']['contentUrl'] = \$this->singleSRC;
}

if (\$this->hasDetails) {
  \$schemaOrg['description'] = \$this->rawHtmlToPlainText(\$this->details);
}

\$this->addSchemaOrg(\$schemaOrg);
?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/event/event_full.html5";
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
        return new Source("<div class=\"event layout_full block<?php if(\$this->class): ?> <?= \$this->class ?><?php endif; ?>\" itemscope itemtype=\"http://schema.org/Event\">

  <div class=\"title h1\"><?= \$this->title ?></div>
  <div class=\"info\">
  \t<time datetime=\"<?= \$this->datetime ?>\" itemprop=\"startDate\"><?= \$this->date ?><?php if (\$this->time): ?>, <?= \$this->time ?><?php endif; ?></time>
  \t<?php if (\$this->location): ?>
    \t<p class=\"location\"><?= \$this->locationLabel ?>: <?= \$this->location ?></p>
\t<?php endif; ?>
  </div>
  <div class=\"clear\"></div>
  <?php if (\$this->recurring): ?>
    <p class=\"recurring\"><?= \$this->recurring ?><?php if (\$this->until) echo ' ' . \$this->until; ?>.</p>
  <?php endif; ?>

  <?php if (\$this->hasDetails): ?>
    <?= \$this->details ?>
  <?php else: ?>
    <div class=\"ce_text block\" itemprop=\"description\">
      <?= \$this->teaser ?>
    </div>
  <?php endif; ?>

  <?php if (\$this->enclosure): ?>
    <div class=\"enclosure\">
      <?php foreach (\$this->enclosure as \$enclosure): ?>
        <p><?= \\Contao\\Image::getHtml(\$enclosure['icon'], '', 'class=\"mime_icon\"') ?> <a href=\"<?= \$enclosure['href'] ?>\" title=\"<?= \$enclosure['title'] ?>\" itemprop=\"url\"><?= \$enclosure['link'] ?> <span class=\"size\">(<?= \$enclosure['filesize'] ?>)</span></a></p>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?php
\$schemaOrg = \$this->getSchemaOrgData();
if( \$this->addImage && \$this->singleSRC )
{
\t\$schemaOrg['primaryImageOfPage']['contentUrl'] = \$this->singleSRC;
}

if (\$this->hasDetails) {
  \$schemaOrg['description'] = \$this->rawHtmlToPlainText(\$this->details);
}

\$this->addSchemaOrg(\$schemaOrg);
?>", "@pct_theme_templates/event/event_full.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/event/event_full.html5");
    }
}
