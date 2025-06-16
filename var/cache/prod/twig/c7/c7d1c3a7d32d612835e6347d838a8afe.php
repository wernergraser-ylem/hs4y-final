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

/* @pct_theme_templates/customcatalog/customcatalog_productcatalog_related.html5 */
class __TwigTemplate_dc10a19d163fdee5348c757cfbcb922a extends Template
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
        yield "<?php if(!\$this->empty): ?>
<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t
?>
\t<div class=\"swiper-container\" id=\"swiper_<?php echo \$this->id; ?>\">
\t\t<div class=\"swiper-wrapper\">
\t\t\t<?php foreach(\$this->entries as \$entry): ?>
\t\t\t<div class=\"swiper-slide block entry<?php if(\$entry->field('highlight')->value()): ?> item-highlight<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t\t\t<div class=\"item-inside\">
\t\t\t\t\t<?php if(\$entry->field('highlight')->value()): ?> <i class=\"item-highlight-icon fa fa-star\"></i><?php endif; ?>
\t\t\t\t\t<a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('image')->html(); ?></a>
\t\t\t\t\t<h6><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('name')->value(); ?></a></h6>
\t\t\t\t\t<div class=\"brand\"><?php echo \$entry->field('brand')->html(); ?></div>
\t\t\t\t\t<div class=\"price color-accent\">&euro;<?php echo \$entry->field('price')->value(); ?><?php if(\$entry->field('price_old')->value()): ?><span> &euro;<?php echo \$entry->field('price_old')->value(); ?></span><?php endif; ?></div>
\t\t\t\t\t<?php echo \$entry->field('rating')->html(); ?>
\t\t\t\t</div>\t
\t\t\t</div>
\t\t\t<?php endforeach; ?>
\t\t</div>\t\t
\t\t<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
\t\t<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>
\t</div>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \tpaginationClickable: true,
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
\t\t\t\tslidesPerView: 3,
\t\t\t\tspaceBetween: 0,
\t\t\t}

\t\t}\t
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
        return "@pct_theme_templates/customcatalog/customcatalog_productcatalog_related.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_productcatalog_related.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_productcatalog_related.html5");
    }
}
