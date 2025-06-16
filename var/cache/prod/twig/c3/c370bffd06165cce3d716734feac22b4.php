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

/* @pct_theme_templates/modules/mod_navigation_mobile_horizontal.html5 */
class __TwigTemplate_301b27cd44291fbb205ae13a625516d8 extends Template
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
        yield "
<!-- indexer::stop -->
<nav <?= \$this->cssID; ?> class=\"<?= \$this->class ?> mobile_horizontal block\"<?php if (\$this->style): ?> style=\"<?= \$this->style ?>\"<?php endif; ?> itemscope itemtype=\"http://schema.org/SiteNavigationElement\">

  <?php if (\$this->headline): ?>
    <<?= \$this->hl ?>><?= \$this->headline ?></<?= \$this->hl ?>>
  <?php endif; ?>

  <?= \$this->items ?>

</nav>
<!-- indexer::continue -->

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\tjQuery('nav.mobile_horizontal .trail').addClass('open');
\tjQuery('nav.mobile_horizontal .trail').parent('li').siblings('li').addClass('hidden')
\tjQuery('nav.mobile_horizontal li.submenu > a').append('<span class=\"opener\"></span>');
\tjQuery('nav.mobile_horizontal li.submenu .opener, nav.mobile_horizontal li.submenu a.forward:not(.click-default), nav.mobile_horizontal li.submenu a.pct_megamenu').click(function(e)
\t{ 
\t\te.preventDefault();
\t\te.stopImmediatePropagation();
\t\t
\t\tvar _this = jQuery(this);
\t\tvar parent = _this.parent('li');
\t\t
\t\t// opener div
\t\tvar isOpener = _this.hasClass('opener');
\t\tif( isOpener )
\t\t{
\t\t\tvar parent = _this.parent('a').parent('li');
\t\t}
\t\t
\t\tif( isOpener  )
\t\t{
\t\t\t_this.siblings('a').toggleClass('open');
\t\t}
\t\t
\t\t_this.toggleClass('open');
\t\tparent.toggleClass('open');
\t\tparent.siblings('li').toggleClass('hidden');

\t\tvar trail = _this.parents('li');
\t\tif( trail[1] )
\t\t{
\t\t\tjQuery(trail[1]).toggleClass('trail');
\t\t\tjQuery(trail[1]).find('> a').toggleClass('trail');
\t\t}
\t\telse
\t\t{
\t\t\tparent.removeClass('trail');
\t\t}
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_navigation_mobile_horizontal.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_navigation_mobile_horizontal.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_navigation_mobile_horizontal.html5");
    }
}
