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

/* @pct_theme_templates/modules/mod_newslist_portfolioteaser.html5 */
class __TwigTemplate_f7e5d7fadc727d381e53d3b7b16ce239 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_newslist_portfolioteaser.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/modules/mod_newslist_portfolioteaser.html5"));

        // line 1
        yield "<?php
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);
?>

<?php 
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = \t'files/cto_layout/scripts/swiper/swiper.min.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist teaser swiper-container <?= \$arrCssID[1]; ?>\">
    <div class=\"swiper-wrapper\">
\t\t<?php echo implode('', \$this->articles); ?>
\t</div>
\t<div class=\"swiper-pagination swiper-pagination-<?php echo \$this->id; ?>\"></div>
\t<div class=\"swiper-button-next swiper-button-next-<?php echo \$this->id; ?>\"></div>
\t<div class=\"swiper-button-prev swiper-button-prev-<?php echo \$this->id; ?>\"></div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper = new Swiper('#portfolio_<?php echo \$this->id; ?>', {
        pagination:\t{
        \tel: '#portfolio_<?php echo \$this->id; ?> .swiper-pagination-<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
        slidesPerView: 'auto',
        spaceBetween: 0,
        grabCursor: true,
\t\tnavigation: {
        \tnextEl: '#portfolio_<?php echo \$this->id; ?> .swiper-button-next-<?php echo \$this->id; ?>',
\t\t\tprevEl: '#portfolio_<?php echo \$this->id; ?> .swiper-button-prev-<?php echo \$this->id; ?>',
\t\t}
    });       
});
</script>
<!-- SEO-SCRIPT-STOP --> 
<?php \$this->endblock(); ?>


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
        return "@pct_theme_templates/modules/mod_newslist_portfolioteaser.html5";
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
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);
?>

<?php 
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = \t'files/cto_layout/scripts/swiper/swiper.min.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist teaser swiper-container <?= \$arrCssID[1]; ?>\">
    <div class=\"swiper-wrapper\">
\t\t<?php echo implode('', \$this->articles); ?>
\t</div>
\t<div class=\"swiper-pagination swiper-pagination-<?php echo \$this->id; ?>\"></div>
\t<div class=\"swiper-button-next swiper-button-next-<?php echo \$this->id; ?>\"></div>
\t<div class=\"swiper-button-prev swiper-button-prev-<?php echo \$this->id; ?>\"></div>
</div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper = new Swiper('#portfolio_<?php echo \$this->id; ?>', {
        pagination:\t{
        \tel: '#portfolio_<?php echo \$this->id; ?> .swiper-pagination-<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
        slidesPerView: 'auto',
        spaceBetween: 0,
        grabCursor: true,
\t\tnavigation: {
        \tnextEl: '#portfolio_<?php echo \$this->id; ?> .swiper-button-next-<?php echo \$this->id; ?>',
\t\t\tprevEl: '#portfolio_<?php echo \$this->id; ?> .swiper-button-prev-<?php echo \$this->id; ?>',
\t\t}
    });       
});
</script>
<!-- SEO-SCRIPT-STOP --> 
<?php \$this->endblock(); ?>


", "@pct_theme_templates/modules/mod_newslist_portfolioteaser.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_portfolioteaser.html5");
    }
}
