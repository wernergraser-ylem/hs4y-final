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

/* @pct_theme_templates/customelements/customelement_countdown.html5 */
class __TwigTemplate_9818c06629ce9ee87ffac5867cc750d4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_countdown.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_countdown.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_countdown.css|static';
?>
<div class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"countdown_<?= \$this->origin->get('pid') ?>\" class=\"countdown <?= \$this->field('align')->value(); ?> <?= \$this->field('font_size')->value(); ?> <?= \$this->field('font_color')->value(); ?>\">
\t<ul>
\t\t<li class=\"days\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_days')->value(); ?></span></li>
\t\t<li class=\"hours\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_hours')->value(); ?></span></li>
\t\t<li class=\"minutes\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_minutes')->value(); ?></span></li>
\t\t<li class=\"seconds\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_seconds')->value(); ?></span></li>
\t</ul>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\t<?php 
\t\$arrTime = array(0,0);
\tif( \$this->field('time')->value() )
\t{
\t\t\$arrTime = explode(':',\$this->field('time')->value());
\t}
\t\$time = mktime(
\t\t(int)\$arrTime[0], 
\t\t(int)\$arrTime[1],
\t\t0,
\t\t\$this->field('months')->value(),
\t\t\$this->field('day')->value(),
\t\t\$this->field('year')->value()
\t);
\t?>
\t
\tvar targetDate = new Date(\"<?= strftime('%b %e, %Y %T',\$time); ?>\").getTime();
\t// start the interval
\tvar intVal<?= \$this->id; ?> = setInterval(function()
\t{
\t\tvar elem = jQuery('#countdown_<?= \$this->origin->get('pid') ?>');
\t
\t\tvar delta = targetDate - new Date().getTime();
\t\tvar days = Math.floor(delta / (1000 * 60 * 60 * 24));
\t\tvar hours = Math.floor((delta % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); 
\t\tvar minutes = Math.floor((delta % (1000 * 60 * 60)) / (1000 * 60)); 
\t\tvar seconds = Math.floor((delta % (1000 * 60)) / 1000); 
\t\t
\t\t// leading zero
\t\tif( hours < 10 ){hours = '0' + hours;}
\t\tif( minutes < 10 ){minutes = '0' + minutes;}
\t\tif( seconds < 10 ){seconds = '0' + seconds;}

\t\telem.find('.days .value').text(days);
\t\telem.find('.hours .value').text(hours);
\t\telem.find('.minutes .value').text(minutes);
\t\telem.find('.seconds .value').text(seconds);
\t\t
\t\tif(days < 1)
\t\t{
\t\t\telem.find('.days').addClass('elapsed');
\t\t}
\t\t
\t\tif(days < 1 && hours < 1)
\t\t{
\t\t\telem.find('.hours').addClass('elapsed');
\t\t}
\t\t
\t\tif(days < 1 && hours < 1 && minutes < 1)
\t\t{
\t\t\telem.find('.minutes').addClass('elapsed');
\t\t} 
\t\t
\t\tif(days < 1 && hours < 1 && minutes < 1 && seconds < 1)
\t\t{
\t\t\telem.find('.seconds').addClass('elapsed');
\t\t}
\t}, 1000);
});
</script>
<!-- SEO-SCRIPT-STOP -->
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
        return "@pct_theme_templates/customelements/customelement_countdown.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_countdown.css|static';
?>
<div class=\"<?= \$this->class; ?> block\"<?= \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?= \$this->style; ?>\"<?php endif; ?>>
\t<div id=\"countdown_<?= \$this->origin->get('pid') ?>\" class=\"countdown <?= \$this->field('align')->value(); ?> <?= \$this->field('font_size')->value(); ?> <?= \$this->field('font_color')->value(); ?>\">
\t<ul>
\t\t<li class=\"days\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_days')->value(); ?></span></li>
\t\t<li class=\"hours\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_hours')->value(); ?></span></li>
\t\t<li class=\"minutes\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_minutes')->value(); ?></span></li>
\t\t<li class=\"seconds\"><span class=\"value\"></span><span class=\"unit\"><?= \$this->field('label_seconds')->value(); ?></span></li>
\t</ul>
\t</div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
\t<?php 
\t\$arrTime = array(0,0);
\tif( \$this->field('time')->value() )
\t{
\t\t\$arrTime = explode(':',\$this->field('time')->value());
\t}
\t\$time = mktime(
\t\t(int)\$arrTime[0], 
\t\t(int)\$arrTime[1],
\t\t0,
\t\t\$this->field('months')->value(),
\t\t\$this->field('day')->value(),
\t\t\$this->field('year')->value()
\t);
\t?>
\t
\tvar targetDate = new Date(\"<?= strftime('%b %e, %Y %T',\$time); ?>\").getTime();
\t// start the interval
\tvar intVal<?= \$this->id; ?> = setInterval(function()
\t{
\t\tvar elem = jQuery('#countdown_<?= \$this->origin->get('pid') ?>');
\t
\t\tvar delta = targetDate - new Date().getTime();
\t\tvar days = Math.floor(delta / (1000 * 60 * 60 * 24));
\t\tvar hours = Math.floor((delta % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); 
\t\tvar minutes = Math.floor((delta % (1000 * 60 * 60)) / (1000 * 60)); 
\t\tvar seconds = Math.floor((delta % (1000 * 60)) / 1000); 
\t\t
\t\t// leading zero
\t\tif( hours < 10 ){hours = '0' + hours;}
\t\tif( minutes < 10 ){minutes = '0' + minutes;}
\t\tif( seconds < 10 ){seconds = '0' + seconds;}

\t\telem.find('.days .value').text(days);
\t\telem.find('.hours .value').text(hours);
\t\telem.find('.minutes .value').text(minutes);
\t\telem.find('.seconds .value').text(seconds);
\t\t
\t\tif(days < 1)
\t\t{
\t\t\telem.find('.days').addClass('elapsed');
\t\t}
\t\t
\t\tif(days < 1 && hours < 1)
\t\t{
\t\t\telem.find('.hours').addClass('elapsed');
\t\t}
\t\t
\t\tif(days < 1 && hours < 1 && minutes < 1)
\t\t{
\t\t\telem.find('.minutes').addClass('elapsed');
\t\t} 
\t\t
\t\tif(days < 1 && hours < 1 && minutes < 1 && seconds < 1)
\t\t{
\t\t\telem.find('.seconds').addClass('elapsed');
\t\t}
\t}, 1000);
});
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/customelements/customelement_countdown.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_countdown.html5");
    }
}
