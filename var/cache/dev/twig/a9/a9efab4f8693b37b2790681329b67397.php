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

/* @pct_theme_templates/customcatalog/customcatalog_cardealer_list.html5 */
class __TwigTemplate_73ed75351bddade6c67629ad0d0a0861 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_cardealer_list.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_cardealer_list.html5"));

        // line 1
        yield "<div class=\"list-options\">
\t<i class=\"fa fa-list\"></i>
\t<i class=\"fa fa-th\"></i>
</div>
<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t
\t\t\t<div class=\"item-leftside\">
\t\t\t\t<div class=\"item-state\"><?php echo \$entry->field('state')->html(); ?></div>
\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t<div class=\"item-link-youtube\"><a href=\"<?php echo \$entry->field('youtube')->value(); ?>\" target=\"_blank\"><i class=\"fa fa-play\"></i>Video</a></div>
\t\t\t\t<div class=\"item-link-detail\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><i class=\"fa fa-plus\"></i>Details</a></div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"item-rightside\">
\t\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star\"></i><?php endif; ?>
\t\t\t\t<h4><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h4>
\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t<div class=\"item-content-col1\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t\t<?php echo \$entry->field('notelist')->html(); ?>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"item-content-col2\">
\t\t\t\t\t&euro;<?php echo \$entry->field('price')->html(); ?>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<ul>
\t\t\t\t\t<li><i class=\"fa fa-dashboard\"></i> <?php echo \$entry->field('mileage')->value(); ?> km</li>
\t\t\t\t\t<li><i class=\"fa fa-plug\"></i> <?php echo \$entry->field('transmission')->html(); ?></li>
\t\t\t\t\t<li><i class=\"fa fa-male\"></i> <?php echo \$entry->field('doors')->value(); ?> T&uuml;ren</li>
\t\t\t\t\t<li><i class=\"fa fa-calendar\"></i> <?php echo \$entry->field('year')->value(); ?></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t
\t\t</div>
\t\t\t
\t</div>
\t
<?php \$sum += \$entry->field('price')->value(); ?>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Kein Auto gefunden</p>
<?php endif;?>

<div class=\"notelist-sum bg-accent\">
\t<div class=\"headline\">Gesamtsumme: </div>
\t<span>&euro; <?php echo \$sum; ?></span>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
\t
\tvar view_isGrid = localStorage.getItem('view_isGrid');
\t
\tif (view_isGrid == 1) {
\t\tjQuery('.mod_customcataloglist.cc_cardealer').addClass('grid-view');
\t}
\t
\tjQuery(\".list-options .fa-th\").click(function(){
    \tjQuery(\".mod_customcataloglist.cc_cardealer\").addClass(\"grid-view\");
\t\tlocalStorage.setItem('view_isGrid', 1);
\t\t
\t});
\t
\tjQuery(\".list-options .fa-list\").click(function(){
    \tjQuery(\".mod_customcataloglist.cc_cardealer\").removeClass(\"grid-view\");
    \tlocalStorage.removeItem('view_isGrid');
\t});
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
        return "@pct_theme_templates/customcatalog/customcatalog_cardealer_list.html5";
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
        return new Source("<div class=\"list-options\">
\t<i class=\"fa fa-list\"></i>
\t<i class=\"fa fa-th\"></i>
</div>
<?php \$sum = 0; ?>
<?php if(!\$this->empty): ?>
<div class=\"item-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"block <?= \$entry->class; ?> <?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t
\t\t<div class=\"item-inside\">
\t\t\t
\t\t\t<div class=\"item-leftside\">
\t\t\t\t<div class=\"item-state\"><?php echo \$entry->field('state')->html(); ?></div>
\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t<div class=\"item-link-youtube\"><a href=\"<?php echo \$entry->field('youtube')->value(); ?>\" target=\"_blank\"><i class=\"fa fa-play\"></i>Video</a></div>
\t\t\t\t<div class=\"item-link-detail\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><i class=\"fa fa-plus\"></i>Details</a></div>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"item-rightside\">
\t\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star\"></i><?php endif; ?>
\t\t\t\t<h4><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h4>
\t\t\t\t<div class=\"item-content\">
\t\t\t\t\t<div class=\"item-content-col1\">
\t\t\t\t\t<?php echo \$entry->field('short_description')->value(); ?>
\t\t\t\t\t<?php echo \$entry->field('notelist')->html(); ?>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"item-content-col2\">
\t\t\t\t\t&euro;<?php echo \$entry->field('price')->html(); ?>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<ul>
\t\t\t\t\t<li><i class=\"fa fa-dashboard\"></i> <?php echo \$entry->field('mileage')->value(); ?> km</li>
\t\t\t\t\t<li><i class=\"fa fa-plug\"></i> <?php echo \$entry->field('transmission')->html(); ?></li>
\t\t\t\t\t<li><i class=\"fa fa-male\"></i> <?php echo \$entry->field('doors')->value(); ?> T&uuml;ren</li>
\t\t\t\t\t<li><i class=\"fa fa-calendar\"></i> <?php echo \$entry->field('year')->value(); ?></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t
\t\t</div>
\t\t\t
\t</div>
\t
<?php \$sum += \$entry->field('price')->value(); ?>

<?php endforeach; ?>
</div>\t\t
<?php else: ?>
<p class=\"info empty\">Kein Auto gefunden</p>
<?php endif;?>

<div class=\"notelist-sum bg-accent\">
\t<div class=\"headline\">Gesamtsumme: </div>
\t<span>&euro; <?php echo \$sum; ?></span>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
\t
\tvar view_isGrid = localStorage.getItem('view_isGrid');
\t
\tif (view_isGrid == 1) {
\t\tjQuery('.mod_customcataloglist.cc_cardealer').addClass('grid-view');
\t}
\t
\tjQuery(\".list-options .fa-th\").click(function(){
    \tjQuery(\".mod_customcataloglist.cc_cardealer\").addClass(\"grid-view\");
\t\tlocalStorage.setItem('view_isGrid', 1);
\t\t
\t});
\t
\tjQuery(\".list-options .fa-list\").click(function(){
    \tjQuery(\".mod_customcataloglist.cc_cardealer\").removeClass(\"grid-view\");
    \tlocalStorage.removeItem('view_isGrid');
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customcatalog/customcatalog_cardealer_list.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_cardealer_list.html5");
    }
}
