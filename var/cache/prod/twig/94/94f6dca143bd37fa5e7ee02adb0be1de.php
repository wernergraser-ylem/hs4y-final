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

/* @pct_theme_templates/customcatalog/customcatalog_booklibrary_teaserslider.html5 */
class __TwigTemplate_f02302a0ef6677d50da9badffdd8aedb extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t
?>
<?php if(!\$this->empty): ?>
\t<div class=\"swiper-container \" id=\"swiper_<?php echo \$this->id; ?>\">
\t\t<div class=\"swiper-wrapper\">
\t\t\t<?php foreach(\$this->entries as \$entry): ?>
\t\t\t<div class=\"swiper-slide block entry\" <?php echo \$this->cssID; ?>>
\t\t\t\t<div class=\"item-inside\">
\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t<?php if(\$entry->field('banner_one')->value() || \$entry->field('banner_two')->value()): ?>
\t\t\t\t\t\t<div class=\"product-banner\">
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<?php if(\$entry->field('banner_one')->value()): ?><li class=\"banner-one bg-accent\"><?php echo \$entry->field('banner_one')->value(); ?></li><?php endif; ?>
\t\t\t\t\t\t<?php if(\$entry->field('banner_two')->value()): ?><li class=\"banner-two bg-second\"><?php echo \$entry->field('banner_two')->value(); ?></li><?php endif; ?>
\t\t\t\t\t\t
\t\t\t\t\t\t<?php if(\$entry->field('banner_one')->value() || \$entry->field('banner_two')->value()): ?>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t\t</div>
\t\t\t
\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t<div class=\"content-inside\">
\t\t\t\t\t\t\t<?php if(\$entry->field('author')->value()): ?><div class=\"author\"><?php echo \$entry->field('author')->html(); ?></div><?php endif; ?>
\t\t\t\t\t\t\t<div class=\"headline\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></div>
\t\t\t\t\t\t\t<?php if(\$entry->field('price')->value()): ?><div class=\"price color-accent\">&euro; <?php echo \$entry->field('price')->html(); ?></div><?php endif; ?>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t</div>
\t\t<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
\t\t<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>
\t</div>\t

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \tpaginationClickable: true,
\t \tpagination:\t{
        \tel: '.swiper-pagination_<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
\t \tgrabCursor: true,
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\tbreakpoints: {
        \t10: {
\t\t\t\tslidesPerView: 1,
\t\t\t\tspaceBetween: 0,
\t\t\t},
\t\t\t768: {
\t\t\t\tslidesPerView: 5,
\t\t\t\tspaceBetween: 0,
\t\t\t},

\t\t},
    });       
});
</script>
<!-- SEO-SCRIPT-STOP -->
<?php else: ?>
<p class=\"info empty\">Keine Artikel gefunden</p>
<?php endif;?>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_booklibrary_teaserslider.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_booklibrary_teaserslider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_booklibrary_teaserslider.html5");
    }
}
