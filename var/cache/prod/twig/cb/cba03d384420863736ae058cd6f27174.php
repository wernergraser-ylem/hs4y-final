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

/* @pct_theme_templates/modules/mod_newslist_portfolioteaser_v2.html5 */
class __TwigTemplate_4d31989fd9962b99b2a497abc02435ff extends Template
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
namespace Contao;\t

\$arrModel = ModuleModel::findByPk(\$this->id)->originalRow();
\$arrCssID =  StringUtil::deserialize(\$arrModel['cssID']);
?>
<?php \$this->extend('block_unsearchable'); ?>

<?php \$this->block('content'); ?>
<?php 
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = \t'files/cto_layout/scripts/swiper/swiper.min.css|static';
?>
<div id=\"portfolio_<?php echo \$this->id; ?>\" class=\"mod_portfoliolist_teaser_2 swiper-container <?= \$arrCssID[1]; ?>\">
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
\t\t},
\t\tautoplay :
\t\t{
\t\t\tdelay:10000
\t\t}
    });       
});

</script>
<!-- SEO-SCRIPT-STOP -->
<?php \$this->endblock(); ?>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/modules/mod_newslist_portfolioteaser_v2.html5";
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
        return new Source("", "@pct_theme_templates/modules/mod_newslist_portfolioteaser_v2.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/modules/mod_newslist_portfolioteaser_v2.html5");
    }
}
