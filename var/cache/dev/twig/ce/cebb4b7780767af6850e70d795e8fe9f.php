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

/* @pct_theme_templates/customelements/customelement_portfoliofilter.html5 */
class __TwigTemplate_cb0b48966e2382a7c06f1fab9b1900ce extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_portfoliofilter.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_portfoliofilter.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_portfoliofilter.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block filter <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('align')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_portfoliofilter_content\">
\t\t<a data-filter=\"*\" class=\"all <?php if(\\Contao\\Input::get('filter') == ''): ?>selected<?php endif; ?>\"><?php echo \$this->field('label')->value(); ?></a>
\t\t<?php foreach(\$this->group('filter') as \$i => \$fields): ?>
\t\t<a data-filter=\".filter_<?= \\Contao\\StringUtil::standardize(\$this->field('name#'.\$i)->value()); ?>\">
\t\t\t<?php if(\$this->field('icon#'.\$i)->value()): ?><i class=\"<?php echo \$this->field('icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t<span class=\"name\"><?php if(\$this->field('label_items#'.\$i)->value()): ?><?php echo \$this->field('label_items#'.\$i)->value(); ?><?php else: ?><?php echo \$this->field('name#'.\$i)->value(); ?><?php endif; ?></span>
\t\t</a>
\t\t<?php endforeach; ?>
\t</div>
\t<i class=\"mobile-filter-trigger fa fa-filter\"></i>
</div>

<script type=\"text/javascript\">


jQuery(document).ready(function(){ 
\tjQuery('.ce_portfoliofilter .mobile-filter-trigger').click(function(){
\t\tjQuery('.ce_portfoliofilter').toggleClass('mobile-filter-show');
\t});
});


</script>
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
        return "@pct_theme_templates/customelements/customelement_portfoliofilter.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_portfoliofilter.css|static';
?>
<div class=\"<?php echo \$this->class; ?> block filter <?php echo \$this->field('schema')->value(); ?> <?php echo \$this->field('align')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"ce_portfoliofilter_content\">
\t\t<a data-filter=\"*\" class=\"all <?php if(\\Contao\\Input::get('filter') == ''): ?>selected<?php endif; ?>\"><?php echo \$this->field('label')->value(); ?></a>
\t\t<?php foreach(\$this->group('filter') as \$i => \$fields): ?>
\t\t<a data-filter=\".filter_<?= \\Contao\\StringUtil::standardize(\$this->field('name#'.\$i)->value()); ?>\">
\t\t\t<?php if(\$this->field('icon#'.\$i)->value()): ?><i class=\"<?php echo \$this->field('icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t<span class=\"name\"><?php if(\$this->field('label_items#'.\$i)->value()): ?><?php echo \$this->field('label_items#'.\$i)->value(); ?><?php else: ?><?php echo \$this->field('name#'.\$i)->value(); ?><?php endif; ?></span>
\t\t</a>
\t\t<?php endforeach; ?>
\t</div>
\t<i class=\"mobile-filter-trigger fa fa-filter\"></i>
</div>

<script type=\"text/javascript\">


jQuery(document).ready(function(){ 
\tjQuery('.ce_portfoliofilter .mobile-filter-trigger').click(function(){
\t\tjQuery('.ce_portfoliofilter').toggleClass('mobile-filter-show');
\t});
});


</script>
 ", "@pct_theme_templates/customelements/customelement_portfoliofilter.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_portfoliofilter.html5");
    }
}
