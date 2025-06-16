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

/* @pct_theme_templates/modules/mod_newslist_teaser_v6.html5 */
class __TwigTemplate_fb43fc01b6770a0301b793df52472534 extends Template
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = \t'files/cto_layout/scripts/swiper/swiper.min.css|static';
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>

<div id=\"mod_newslist_teaser_v6_<?php echo \$this->id; ?>\" class=\"mod_newsteaser_v6 swiper-container\">
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
 var swiper = new Swiper('#mod_newslist_teaser_v6_<?php echo \$this->id; ?>', {
        pagination:\t{
        \tel: '#mod_newslist_teaser_v6_<?php echo \$this->id; ?> .swiper-pagination-<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
        slidesPerView: 'auto',
        spaceBetween: 0,
        grabCursor: true,
        navigation: {
        \tnextEl: '#mod_newslist_teaser_v6_<?php echo \$this->id; ?> .swiper-button-next-<?php echo \$this->id; ?>',
\t\t\tprevEl: '#mod_newslist_teaser_v6_<?php echo \$this->id; ?> .swiper-button-prev-<?php echo \$this->id; ?>',
\t\t}
    });       
});

function fullScreenHelper() {
\tsetTimeout(function() {
\t\t
\t\tvar headerIsAbsolute = 0;
\t\t
\t\tif (jQuery(\"#fix-wrapper\").css(\"position\") === \"absolute\") {
\t\t\tvar headerIsAbsolute = 1;
\t\t}
\t\t
\t\tvar windowHeight = jQuery(window).height();
\t\tvar headerHeight = jQuery(\"#top-wrapper\").height();
\t\tviewportHeight = windowHeight - headerHeight;
\t\t
\t\tif (headerIsAbsolute == 1) {
\t\t\tjQuery(\".fullscreen-helper\").css({\"height\": \"\"});
\t\t} else {
\t\t\tjQuery(\".fullscreen-helper\").css({\"height\": viewportHeight + \"px\"});
\t\t}
\t
\t},500);
\t
};

jQuery(document).ready(function(){
\tfullScreenHelper();
});

jQuery(window).on(\"resize\", function(){ 
\tfullScreenHelper(); 
});


</script>
<!-- SEO-SCRIPT-STOP --> 
<?php \$this->endblock(); ?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_newslist_teaser_v6.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_newslist_teaser_v6.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_teaser_v6.html5");
    }
}
