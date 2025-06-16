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

/* @pct_theme_templates/customelements/customelement_slide_in_toggler.html5 */
class __TwigTemplate_58e4625a26bcb0fc3a6fd06e4361f521 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_slide_in_toggler.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_slide_in_toggler.html5"));

        // line 1
        yield "<!-- indexer::stop -->
<?php 
\$slideStartId = \$GLOBALS['CE_SLIDE_IN_START'] ?? 0; // id of the slide-in-start element to be toggled
?>
<div class=\"<?= \$this->class; ?> ce_slide_in_toggler_<?= \$this->id; ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-size=\"<?= \$this->field('size')->value(); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\"<?php echo \$this->cssID; ?>>
<?php if( \$this->field('label_open')->value() ): ?>
<button type=\"button\" data-slide_in=\"<?= \$slideStartId; ?>\" class=\"button open\" title=\"<?= \$this->field('label_open')->value(); ?>\"><?= \$this->field('label_open')->value(); ?></button>
<?php endif; ?>
<?php if( \$this->field('label_close')->value() ): ?>
<button type=\"button\" data-slide_in=\"<?= \$slideStartId; ?>\" class=\"button close\" title=\"<?= \$this->field('label_close')->value(); ?>\"><?= \$this->field('label_close')->value(); ?></button>
<?php endif; ?>
</div>
<!-- indexer::continue -->

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tvar startElement = jQuery('.slide-in-container[data-slide_in=\"<?= \$slideStartId; ?>\"]');
\tvar toggler = jQuery('.ce_slide_in_toggler_<?= \$this->id; ?>');
\t
\tconst slide_<?= \$slideStartId; ?> = function(elem)
\t{
\t\tlet wrapper = elem.find('.slide_in_wrapper');
\t\tlet deltaX = ( elem.find('.slide_in_content').width() ) * -1;
\t\twrapper.css('transform','translateX('+ deltaX +'px)');
\t\t
\t\tsetTimeout(function() 
\t\t{
\t\t\twrapper.removeClass('init');
\t\t}, 400);
\t}
\tslide_<?= \$slideStartId; ?>( startElement );
\t
\ttoggler.find('.button').click(function(e)
\t{
\t\te.preventDefault();
\t\ttoggler.toggleClass('open');
\t\tstartElement.toggleClass('open');
\t\tslide_<?= \$slideStartId; ?>( startElement );
\t});
\t
\tjQuery(window).on('resize',function() 
\t{
\t\tslide_<?= \$slideStartId; ?>( startElement );
\t});
\t
\tsetTimeout(function() 
\t{
\t\tjQuery(window).resize();
\t}, 400);
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
        return "@pct_theme_templates/customelements/customelement_slide_in_toggler.html5";
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
        return new Source("<!-- indexer::stop -->
<?php 
\$slideStartId = \$GLOBALS['CE_SLIDE_IN_START'] ?? 0; // id of the slide-in-start element to be toggled
?>
<div class=\"<?= \$this->class; ?> ce_slide_in_toggler_<?= \$this->id; ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\" data-size=\"<?= \$this->field('size')->value(); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\"<?php echo \$this->cssID; ?>>
<?php if( \$this->field('label_open')->value() ): ?>
<button type=\"button\" data-slide_in=\"<?= \$slideStartId; ?>\" class=\"button open\" title=\"<?= \$this->field('label_open')->value(); ?>\"><?= \$this->field('label_open')->value(); ?></button>
<?php endif; ?>
<?php if( \$this->field('label_close')->value() ): ?>
<button type=\"button\" data-slide_in=\"<?= \$slideStartId; ?>\" class=\"button close\" title=\"<?= \$this->field('label_close')->value(); ?>\"><?= \$this->field('label_close')->value(); ?></button>
<?php endif; ?>
</div>
<!-- indexer::continue -->

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\tvar startElement = jQuery('.slide-in-container[data-slide_in=\"<?= \$slideStartId; ?>\"]');
\tvar toggler = jQuery('.ce_slide_in_toggler_<?= \$this->id; ?>');
\t
\tconst slide_<?= \$slideStartId; ?> = function(elem)
\t{
\t\tlet wrapper = elem.find('.slide_in_wrapper');
\t\tlet deltaX = ( elem.find('.slide_in_content').width() ) * -1;
\t\twrapper.css('transform','translateX('+ deltaX +'px)');
\t\t
\t\tsetTimeout(function() 
\t\t{
\t\t\twrapper.removeClass('init');
\t\t}, 400);
\t}
\tslide_<?= \$slideStartId; ?>( startElement );
\t
\ttoggler.find('.button').click(function(e)
\t{
\t\te.preventDefault();
\t\ttoggler.toggleClass('open');
\t\tstartElement.toggleClass('open');
\t\tslide_<?= \$slideStartId; ?>( startElement );
\t});
\t
\tjQuery(window).on('resize',function() 
\t{
\t\tslide_<?= \$slideStartId; ?>( startElement );
\t});
\t
\tsetTimeout(function() 
\t{
\t\tjQuery(window).resize();
\t}, 400);
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_slide_in_toggler.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_slide_in_toggler.html5");
    }
}
