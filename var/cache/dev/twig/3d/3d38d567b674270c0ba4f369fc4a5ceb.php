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

/* @pct_theme_templates/customelements/customelement_typed.html5 */
class __TwigTemplate_4660910485b34e0b3cf4cdbca6b5e2cf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_typed.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_typed.html5"));

        // line 1
        yield "<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/typed/js/typed.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_typed.css|static';
?>
<?php 
\$strings = '';
foreach(\$this->group('headline') as \$i => \$fields) 
{
\t\$strings .=  \"'\" . str_replace(array('&'),array('&amp;'),\$this->field('headline#'.\$i)->value()) . \"',\";
}
\$strings = substr(\$strings, 0, -1);
?>

<div class=\"<?= \$this->class; ?> block <?= \$this->field('schema')->value(); ?>\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<<?= \$this->field('type')->value() ?: 'h1'; ?>>
\t\t<span class=\"ce_typed_<?= \$this->id; ?>\">&nbsp;</span>
\t</<?= \$this->field('type')->value(); ?>>\t
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tfunction initObserver() 
\t{\t
\t\tvar objObserver = new IntersectionObserver( function(entries, observer)
\t\t{
\t\t\tentries.forEach(function(entry) 
\t\t\t{
\t\t\t\tif (entry.isIntersecting) 
\t\t\t\t{
\t\t\t\t\tif( !jQuery('body').hasClass('acc_disable_animations') )
\t\t\t\t\t{
\t\t\t\t\t\tjQuery(entry.target).typed({strings: [<?= \$strings; ?>.replaceAll('&', '&amp;')],typeSpeed: <?= \$this->field('typespeed')->value(); ?>});
\t\t\t\t\t}
\t\t\t\t\telse
\t\t\t\t\t{
\t\t\t\t\t\tjQuery(entry.target).html(<?= \$strings; ?>);
\t\t\t\t\t}
\t\t\t\t\t// stop observing
\t\t\t\t\tobjObserver.unobserve( entry.target );
\t\t\t\t}
\t\t\t});
\t\t}, {root: null,rootMargin: '0px',threshold: 0.25}  );
\t\tobjObserver.observe( jQuery('.ce_typed_<?= \$this->id; ?>')[0] );
\t}

\t// check if a revolutionslider exists in page
\tif (jQuery(document).revolution != undefined)
\t{
\t\tjQuery(document).on('RevolutionSlider.loaded', function (e, params)
\t\t{ 
\t\t\tinitObserver();
\t\t});
\t}
\telse
\t{
\t\tinitObserver();
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_typed.html5";
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/typed/js/typed.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_typed.css|static';
?>
<?php 
\$strings = '';
foreach(\$this->group('headline') as \$i => \$fields) 
{
\t\$strings .=  \"'\" . str_replace(array('&'),array('&amp;'),\$this->field('headline#'.\$i)->value()) . \"',\";
}
\$strings = substr(\$strings, 0, -1);
?>

<div class=\"<?= \$this->class; ?> block <?= \$this->field('schema')->value(); ?>\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<<?= \$this->field('type')->value() ?: 'h1'; ?>>
\t\t<span class=\"ce_typed_<?= \$this->id; ?>\">&nbsp;</span>
\t</<?= \$this->field('type')->value(); ?>>\t
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tfunction initObserver() 
\t{\t
\t\tvar objObserver = new IntersectionObserver( function(entries, observer)
\t\t{
\t\t\tentries.forEach(function(entry) 
\t\t\t{
\t\t\t\tif (entry.isIntersecting) 
\t\t\t\t{
\t\t\t\t\tif( !jQuery('body').hasClass('acc_disable_animations') )
\t\t\t\t\t{
\t\t\t\t\t\tjQuery(entry.target).typed({strings: [<?= \$strings; ?>.replaceAll('&', '&amp;')],typeSpeed: <?= \$this->field('typespeed')->value(); ?>});
\t\t\t\t\t}
\t\t\t\t\telse
\t\t\t\t\t{
\t\t\t\t\t\tjQuery(entry.target).html(<?= \$strings; ?>);
\t\t\t\t\t}
\t\t\t\t\t// stop observing
\t\t\t\t\tobjObserver.unobserve( entry.target );
\t\t\t\t}
\t\t\t});
\t\t}, {root: null,rootMargin: '0px',threshold: 0.25}  );
\t\tobjObserver.observe( jQuery('.ce_typed_<?= \$this->id; ?>')[0] );
\t}

\t// check if a revolutionslider exists in page
\tif (jQuery(document).revolution != undefined)
\t{
\t\tjQuery(document).on('RevolutionSlider.loaded', function (e, params)
\t\t{ 
\t\t\tinitObserver();
\t\t});
\t}
\telse
\t{
\t\tinitObserver();
\t}
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_typed.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_typed.html5");
    }
}
