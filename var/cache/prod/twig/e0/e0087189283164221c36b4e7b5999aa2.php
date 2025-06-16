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

/* @pct_theme_templates/customcatalog/customcatalog_catalog_megamenu_slider.html5 */
class __TwigTemplate_febff60f765deff817faa49a358e70cb extends Template
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
<!-- SEO-SCRIPT-START -->
<script>
var swiper_<?php echo \$this->id; ?> = null;
jQuery(document).ready(function(){
   swiper_<?php echo \$this->id; ?> = new Swiper('#swiper_cc_megamenu_slider', {
      grabCursor: true,
      slidesPerView: 2,
\t \tspaceBetween: 10,
\t \tpagination:\t{
        \tel: '#swiper-pagination_swiper_cc_megamenu_slider',
\t\t\tclickable: true,
      },
\t});
});
</script>
<!-- SEO-SCRIPT-STOP -->
<div class=\"cc_catalog_megamenu_slider\">
   <div class=\"swiper-container\" id=\"swiper_cc_megamenu_slider\">
      <div class=\"swiper-wrapper\">
         <?php foreach(\$this->entries as \$entry): ?>
      \t<div class=\"swiper-slide block entry\" <?php echo \$this->cssID; ?>>
         \t<a href=\"<?php echo \$entry->links('detail')->url; ?>\">
               <div class=\"image\"><?php echo \$entry->field('image')->html(); ?></div>
               <div class=\"name\"><?php echo \$entry->field('name')->value(); ?></div>
               <div class=\"price\">&euro; <?php echo \$entry->field('price')->html(); ?></div>
              <!-- remove comment if you need field price_old
                 <?php if(\$entry->field('price_old')->value()): ?><div class=\"price_old\">&euro; <?php echo \$entry->field('price_old')->html(); ?></div><?php endif; ?> 
               -->
         \t</a>
      \t</div>
         <?php endforeach; ?>
      </div>
      <div id=\"swiper-pagination_swiper_cc_megamenu_slider\" class=\"swiper-pagination\"></div>
   </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_catalog_megamenu_slider.html5";
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
        return new Source("", "@pct_theme_templates/customcatalog/customcatalog_catalog_megamenu_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_catalog_megamenu_slider.html5");
    }
}
