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

/* @pct_theme_templates/customcatalog/customcatalog_immorealty_slider.html5 */
class __TwigTemplate_d910c9ce24d37b17f3c1f54f29046f5f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_immorealty_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customcatalog/customcatalog_immorealty_slider.html5"));

        // line 1
        yield "<?php
namespace Contao;

\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \tpaginationClickable: true,
\t \tslidesPerView: 1,
\t \tgrabCursor: true,
\t \tautoplay: {
        \tdelay: 3000,
\t\t\tdisableOnInteraction: false,
      \t},
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\tpagination:\t{
        \tel: '#swiper-pagination_<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
    });       
});
</script>
<!-- SEO-SCRIPT-STOP -->
<div class=\"cc_immorealty_slider\">
<div class=\"swiper-container\" id=\"swiper_<?php echo \$this->id; ?>\">
<div class=\"swiper-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"swiper-slide block entry<?php if(\$entry->field('top_object')->value()): ?> top_object<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t<?php 
\t\t\$strImage = \$entry->field('image')->generate();
\t\t\$objFile = FilesModel::findByPk( \$entry->field('image')->value() );
\t\t\$size = StringUtil::deserialize( \$entry->field('image')->option('size') );
\t\tif( \$objFile !== null && \\is_array(\$size) )
\t\t{
\t\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\t\tif( \$objPicture !== null )
\t\t\t{
\t\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t\t// look up prefered source image file (not media query)
\t\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t\t{
\t\t\t\t\tif( isset(\$data['src']) && \$data['src'] != \$strImage)
\t\t\t\t\t{
\t\t\t\t\t\t\$strImage = \$data['src'];
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t}
\t\t?>
\t\t<div class=\"image\" style=\"background-image: url(<?= \$strImage; ?>);\"></div>
\t\t
\t\t<div class=\"content-outside\">
\t\t\t<div class=\"content-inside\">
\t\t<div class=\"content-left\">
\t\t\t<div class=\"category\"><?php echo \$entry->field('category')->html(); ?></div>
\t\t\t<?php if(\$entry->field('purchase_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('purchase_price')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$entry->field('rent_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('rent_price')->value(); ?> <span>/ Monat</span></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"content-right\">
\t\t\t<div class=\"place\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('map')->option('city'); ?>, <?php echo \$entry->field('map')->option('street'); ?><i class=\"fa fa-angle-double-right\"></i></a></div>
\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
<?php endforeach; ?>

</div>
<div id=\"swiper-pagination_<?php echo \$this->id; ?>\" class=\"swiper-pagination\"></div>
<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>

</div>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customcatalog/customcatalog_immorealty_slider.html5";
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
namespace Contao;

\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';\t

\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function(){
 var swiper_<?php echo \$this->id; ?> = new Swiper('#swiper_<?php echo \$this->id; ?>', {
\t \tpaginationClickable: true,
\t \tslidesPerView: 1,
\t \tgrabCursor: true,
\t \tautoplay: {
        \tdelay: 3000,
\t\t\tdisableOnInteraction: false,
      \t},
\t \tnavigation: {
        \tnextEl: '#swiper-button-next_<?php echo \$this->id; ?>',
\t\t\tprevEl: '#swiper-button-prev_<?php echo \$this->id; ?>',
\t\t},
\t\tpagination:\t{
        \tel: '#swiper-pagination_<?php echo \$this->id; ?>',
\t\t\tclickable: true,
      \t},
    });       
});
</script>
<!-- SEO-SCRIPT-STOP -->
<div class=\"cc_immorealty_slider\">
<div class=\"swiper-container\" id=\"swiper_<?php echo \$this->id; ?>\">
<div class=\"swiper-wrapper\">
<?php foreach(\$this->entries as \$entry): ?>
\t<div class=\"swiper-slide block entry<?php if(\$entry->field('top_object')->value()): ?> top_object<?php endif; ?>\" <?php echo \$this->cssID; ?>>
\t\t<?php 
\t\t\$strImage = \$entry->field('image')->generate();
\t\t\$objFile = FilesModel::findByPk( \$entry->field('image')->value() );
\t\t\$size = StringUtil::deserialize( \$entry->field('image')->option('size') );
\t\tif( \$objFile !== null && \\is_array(\$size) )
\t\t{
\t\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$objFile->path, \$size);
\t\t\tif( \$objPicture !== null )
\t\t\t{
\t\t\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\t\t\t// look up prefered source image file (not media query)
\t\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t\t{
\t\t\t\t\tif( isset(\$data['src']) && \$data['src'] != \$strImage)
\t\t\t\t\t{
\t\t\t\t\t\t\$strImage = \$data['src'];
\t\t\t\t\t}
\t\t\t\t}
\t\t\t}
\t\t}
\t\t?>
\t\t<div class=\"image\" style=\"background-image: url(<?= \$strImage; ?>);\"></div>
\t\t
\t\t<div class=\"content-outside\">
\t\t\t<div class=\"content-inside\">
\t\t<div class=\"content-left\">
\t\t\t<div class=\"category\"><?php echo \$entry->field('category')->html(); ?></div>
\t\t\t<?php if(\$entry->field('purchase_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('purchase_price')->value(); ?></div>
\t\t\t<?php endif; ?>
\t\t\t\t\t\t
\t\t\t<?php if(\$entry->field('rent_price')->value() > 0): ?>
\t\t\t<div class=\"price\">&euro; <?php echo \$entry->field('rent_price')->value(); ?> <span>/ Monat</span></div>
\t\t\t<?php endif; ?>
\t\t</div>
\t\t
\t\t<div class=\"content-right\">
\t\t\t<div class=\"place\"><a href=\"<?php echo \$entry->links('detail')->url; ?>\"><?php echo \$entry->field('map')->option('city'); ?>, <?php echo \$entry->field('map')->option('street'); ?><i class=\"fa fa-angle-double-right\"></i></a></div>
\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
<?php endforeach; ?>

</div>
<div id=\"swiper-pagination_<?php echo \$this->id; ?>\" class=\"swiper-pagination\"></div>
<div id=\"swiper-button-next_<?php echo \$this->id; ?>\" class=\"swiper-button-next\"></div>
<div id=\"swiper-button-prev_<?php echo \$this->id; ?>\" class=\"swiper-button-prev\"></div>

</div>
</div>", "@pct_theme_templates/customcatalog/customcatalog_immorealty_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customcatalog/customcatalog_immorealty_slider.html5");
    }
}
