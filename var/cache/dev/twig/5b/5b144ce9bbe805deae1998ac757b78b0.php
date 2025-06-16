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

/* @pct_theme_templates/customelements/customelement_tabs_start.html5 */
class __TwigTemplate_cbd3dbc047834d694c150f18b77a8855 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_tabs_start.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_tabs_start.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_tabs.css|static';
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\t// set aria 
\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li:first\").addClass('active');
\tjQuery(\".tabs_<?= \$this->id; ?> li:first span\").attr('aria-selected',true);
\t
\tjQuery(\".panes_<?= \$this->id; ?> .section\").each(function(i,elem)
\t{
\t\tjQuery(elem).attr('id','panes_<?= \$this->id; ?>_' + i);
\t\tjQuery(elem).attr('role','tabpanel').attr('tabindex',i).attr('aria-labelledby','tab_<?= \$this->id; ?>_' + i);
\t});

\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li\").click(function(e)
\t{
\t\tif (!jQuery(this).hasClass(\"active\")) 
\t\t{
            var tabNum = jQuery(this).index();
            var nthChild = tabNum+1;
            jQuery(\".tabs_<?= \$this->id; ?> > ul > li.active\").removeClass(\"active\").attr('aria-selected',false);
\t\t\tjQuery(this).addClass(\"active\").attr('aria-selected',true);
\t\t\tjQuery(\".panes_<?= \$this->id; ?> > div.active\").removeClass(\"active\");
            jQuery(\".panes_<?= \$this->id; ?> > div:nth-child(\"+nthChild+\")\").addClass(\"active\");

\t\t\t// uncomment to store the selection in localStorage
\t\t\t//localStorage.setItem('tab_<?= \$this->id; ?>',nthChild);
        }
\t});
\t
\tvar tabNum = -1;    
    <?php // set tab active by GET paramter: tab_ID-OF-ELEMENT=INDEX-OF-TAB
\tif( (int)\\Contao\\Input::get('tab_'.\$this->id) > 0 ): ?>
\ttabNum = <?= (int)\\Contao\\Input::get('tab_'.\$this->id); ?> - 1;
\t<?php endif; ?>
\t
\t// load from localStorage
\tif( localStorage.getItem('tab_<?= \$this->id; ?>') !== undefined && localStorage.getItem('tab_<?= \$this->id; ?>') !== null )
\t{
\t\ttabNum = parseInt( localStorage.getItem('tab_<?= \$this->id; ?>') ) - 1;\t
\t}
\t
\tif( tabNum >= 0 )
\t{
\t\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li\").removeClass('active');
\t\tjQuery(\".panes_<?php echo \$this->id; ?> > div\").removeClass(\"active\");
\t\tjQuery( jQuery(\".tabs_<?= \$this->id; ?> > ul > li\")[tabNum] ).addClass('active');
\t\tjQuery( jQuery(\".panes_<?= \$this->id; ?> > div\")[tabNum] ).addClass(\"active\");
\t}
});

</script>
<!-- SEO-SCRIPT-STOP -->\t
<div class=\"<?php echo \$this->class; ?> block<?php if(\$this->field('no_margin')->value()): ?> no-margin<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"tabs tabs_<?php echo \$this->id; ?> <?php echo \$this->field('schema')->value(); ?>\" aria-label=\"Tabs\">
\t\t<ul role=\"tablist\" <?php if(\$this->field('margin')->value()): ?> style=\"margin-bottom:<?php echo \$this->field('margin')->value(); ?>px\"<?php endif; ?> >
\t\t<?php foreach(\$this->group('tab') as \$i => \$fields): ?>
\t\t\t<li class=\"<?php echo \$this->field('counts')->value(); ?>\" id=\"tab_<?= \$this->id .'_'.\$i; ?>\" role=\"presentation\">
\t\t\t\t<span role=\"tab\" aria-selected=\"<?= \$i == 0 ? 'true' : 'false'; ?>\" aria-controls=\"panes_<?= \$this->id.'_'.\$i; ?>\" tabindex=\"<?= \$i; ?>\">
\t\t\t\t\t<?php if(\$this->field('icon#'.\$i)->value()): ?><i class=\"<?php echo \$this->field('icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('image-icon#'.\$i)->value()): ?><?php echo \$this->field('image-icon#'.\$i)->html(); ?><?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('title#'.\$i)->value()): ?><?php echo \$this->field('title#'.\$i)->value(); ?><?php endif; ?>
\t\t\t\t</span>
\t\t\t</li>
\t\t<?php endforeach; ?>
\t\t</ul>
\t</div>
\t<div class=\"panes panes_<?php echo \$this->id; ?> <?php echo \$this->field('schema')->value(); ?>\">
\t\t<div class=\"section active\">";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_tabs_start.html5";
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_tabs.css|static';
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()
{
\t// set aria 
\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li:first\").addClass('active');
\tjQuery(\".tabs_<?= \$this->id; ?> li:first span\").attr('aria-selected',true);
\t
\tjQuery(\".panes_<?= \$this->id; ?> .section\").each(function(i,elem)
\t{
\t\tjQuery(elem).attr('id','panes_<?= \$this->id; ?>_' + i);
\t\tjQuery(elem).attr('role','tabpanel').attr('tabindex',i).attr('aria-labelledby','tab_<?= \$this->id; ?>_' + i);
\t});

\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li\").click(function(e)
\t{
\t\tif (!jQuery(this).hasClass(\"active\")) 
\t\t{
            var tabNum = jQuery(this).index();
            var nthChild = tabNum+1;
            jQuery(\".tabs_<?= \$this->id; ?> > ul > li.active\").removeClass(\"active\").attr('aria-selected',false);
\t\t\tjQuery(this).addClass(\"active\").attr('aria-selected',true);
\t\t\tjQuery(\".panes_<?= \$this->id; ?> > div.active\").removeClass(\"active\");
            jQuery(\".panes_<?= \$this->id; ?> > div:nth-child(\"+nthChild+\")\").addClass(\"active\");

\t\t\t// uncomment to store the selection in localStorage
\t\t\t//localStorage.setItem('tab_<?= \$this->id; ?>',nthChild);
        }
\t});
\t
\tvar tabNum = -1;    
    <?php // set tab active by GET paramter: tab_ID-OF-ELEMENT=INDEX-OF-TAB
\tif( (int)\\Contao\\Input::get('tab_'.\$this->id) > 0 ): ?>
\ttabNum = <?= (int)\\Contao\\Input::get('tab_'.\$this->id); ?> - 1;
\t<?php endif; ?>
\t
\t// load from localStorage
\tif( localStorage.getItem('tab_<?= \$this->id; ?>') !== undefined && localStorage.getItem('tab_<?= \$this->id; ?>') !== null )
\t{
\t\ttabNum = parseInt( localStorage.getItem('tab_<?= \$this->id; ?>') ) - 1;\t
\t}
\t
\tif( tabNum >= 0 )
\t{
\t\tjQuery(\".tabs_<?= \$this->id; ?> > ul > li\").removeClass('active');
\t\tjQuery(\".panes_<?php echo \$this->id; ?> > div\").removeClass(\"active\");
\t\tjQuery( jQuery(\".tabs_<?= \$this->id; ?> > ul > li\")[tabNum] ).addClass('active');
\t\tjQuery( jQuery(\".panes_<?= \$this->id; ?> > div\")[tabNum] ).addClass(\"active\");
\t}
});

</script>
<!-- SEO-SCRIPT-STOP -->\t
<div class=\"<?php echo \$this->class; ?> block<?php if(\$this->field('no_margin')->value()): ?> no-margin<?php endif; ?>\"<?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<div class=\"tabs tabs_<?php echo \$this->id; ?> <?php echo \$this->field('schema')->value(); ?>\" aria-label=\"Tabs\">
\t\t<ul role=\"tablist\" <?php if(\$this->field('margin')->value()): ?> style=\"margin-bottom:<?php echo \$this->field('margin')->value(); ?>px\"<?php endif; ?> >
\t\t<?php foreach(\$this->group('tab') as \$i => \$fields): ?>
\t\t\t<li class=\"<?php echo \$this->field('counts')->value(); ?>\" id=\"tab_<?= \$this->id .'_'.\$i; ?>\" role=\"presentation\">
\t\t\t\t<span role=\"tab\" aria-selected=\"<?= \$i == 0 ? 'true' : 'false'; ?>\" aria-controls=\"panes_<?= \$this->id.'_'.\$i; ?>\" tabindex=\"<?= \$i; ?>\">
\t\t\t\t\t<?php if(\$this->field('icon#'.\$i)->value()): ?><i class=\"<?php echo \$this->field('icon#'.\$i)->value(); ?>\"></i><?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('image-icon#'.\$i)->value()): ?><?php echo \$this->field('image-icon#'.\$i)->html(); ?><?php endif; ?>
\t\t\t\t\t<?php if(\$this->field('title#'.\$i)->value()): ?><?php echo \$this->field('title#'.\$i)->value(); ?><?php endif; ?>
\t\t\t\t</span>
\t\t\t</li>
\t\t<?php endforeach; ?>
\t\t</ul>
\t</div>
\t<div class=\"panes panes_<?php echo \$this->id; ?> <?php echo \$this->field('schema')->value(); ?>\">
\t\t<div class=\"section active\">", "@pct_theme_templates/customelements/customelement_tabs_start.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_tabs_start.html5");
    }
}
