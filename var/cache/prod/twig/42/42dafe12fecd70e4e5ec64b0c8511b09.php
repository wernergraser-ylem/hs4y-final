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

/* @pct_theme_templates/customelements/customelement_quickmenu.html5 */
class __TwigTemplate_816cd185adda0e54c1f711e9c049fd08 extends Template
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
        yield "<?php 
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_quickmenu.css|static';
?>
<div class=\"<?php echo \$this->class; ?> mod_quickmenu_<?php echo \$this->id; ?> block <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('position')->value(); ?>\" <?php echo \$this->cssID; ?><?php if (\$this->style): ?> style=\"<?php echo \$this->style; ?>\"<?php endif; ?>>
\t<ul>
\t<?php foreach(\$this->group('content') as \$i => \$fields): ?>
\t\t<li class=\"content\">
\t\t\t<a href=\"<?php echo \$this->field('link#'.\$i)->value(); ?>\"<?php if(\$this->field('link#'.\$i)->option('titleText')): ?> title=\"<?php echo \$this->field('link#'.\$i)->option('titleText'); ?>\"<?php endif; ?><?php if(\$this->field('link#'.\$i)->option('target')): ?> target=\"_blank\"<?php endif; ?>><i class=\"<?php echo \$this->field('icon#'.\$i)->value(); ?>\"></i><span><?php echo \$this->field('label#'.\$i)->value(); ?></span></a>
\t\t</li>
\t<?php endforeach; ?>
\t</ul>
</div>
<?php if(\$this->field('width')->value()): ?>
<?php \$GLOBALS['TL_HEAD'][] = \"<style>.mod_quickmenu_\" . \$this->id  . \" li a:hover {width:\" . \$this->field('width')->value() . \"px!important}</style>\" ;?>
<?php endif; ?>

<?php if(!\$this->field('collapse_no')->value()): ?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
\tjQuery(window).scroll(function(){
\t\tif (jQuery(this).scrollTop() > 300) {
\t\t\tjQuery('.mod_quickmenu').addClass('collapse');
\t\t} else {
\t\t\tjQuery('.mod_quickmenu').removeClass('collapse');
\t\t}
\t}); 
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php endif; ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_quickmenu.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_quickmenu.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_quickmenu.html5");
    }
}
