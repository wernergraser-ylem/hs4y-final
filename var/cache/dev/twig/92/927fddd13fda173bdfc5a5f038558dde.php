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

/* @pct_theme_templates/customelements/customelement_text_inline_images.html5 */
class __TwigTemplate_c31a3dea66585092e84bc14def165b5c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_text_inline_images.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/customelements/customelement_text_inline_images.html5"));

        // line 1
        yield "<?php
namespace Contao;\t
\t
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_inline_images.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

\$arrImages = array();
\$arrImageSizes = array();
\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();\t\t
foreach(\$this->group('content') as \$i => \$fields)
{
\t\$arrImages[\$i] = \$this->field('image#'.\$i)->generate();
\t
\t\$file = FilesModel::findByPk( \$this->field('image#'.\$i)->value() );
\tif( \$file !== null )
\t{
\t\t\$tmp = StringUtil::deserialize( \$file->meta );
\t\tif( isset(\$tmp[ \$GLOBALS['TL_LANGUAGE'] ]) )
\t\t{
\t\t\t\$meta = \$tmp[ \$GLOBALS['TL_LANGUAGE'] ];
\t\t}
\t\tunset(\$tmp);
\t\t
\t\t\$size = StringUtil::deserialize( \$this->field('image#'.\$i)->option('size') );
\t\t// fallback image size
\t\tif( empty( \\array_filter(\$size) ) )
\t\t{
\t\t\t\$size = array('35','35','crop');
\t\t}
\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$file->path, \$size);
\t\t\$arrPictures[ \$i ] = \$objPicture; 
\t\t
\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\tif( \$objPicture !== null && !empty(\$sources) )
\t\t{
\t\t\t// look up prefered source image file (not media query)
\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t{
\t\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t\t{
\t\t\t\t\t\$arrImages[\$i]= \$data['src'];
\t\t\t\t}
\t\t\t}
\t\t}
\t}
}
?>

<<?= \$element; ?> class=\"<?=  \$this->class; ?> ce_text_inline_images_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-speed=\"<?= \$this->field('speed')->value(); ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\">
\t<?php foreach(\$this->group('content') as \$i => \$fields): ?>
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<span class=\"inline_text\"><?= \$this->field('text#'.\$i)->value(); ?></span>
\t\t<?php endif; ?>
\t\t<?php if( isset(\$arrImages[\$i]) && !empty(\$arrImages[\$i]) ): ?>
\t\t<?php 
\t\t\$arrImg = \$arrPictures[\$i]->getImg();
\t\t?>
\t\t<span class=\"inline_image inline_image_<?= \$i; ?>\" style=\"background-image: url(<?= \$arrImages[\$i]; ?>); min-width:<?= \$arrImg['width'].'px'; ?>; background-size:<?= \$arrImg['width'].'px'; ?>;\">&nbsp;</span>
\t\t<?php endif; ?>\t\t\t
\t<?php endforeach; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
    var element = jQuery('.ce_text_inline_images_<?= \$this->id; ?>');
    var waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
        element.addClass('isInViewport');
    });
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
        return "@pct_theme_templates/customelements/customelement_text_inline_images.html5";
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
\t
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_text_inline_images.css|static';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/core.js';
\$GLOBALS['TL_JAVASCRIPT'][] = 'files/cto_layout/scripts/eclipsex/fx/waypoint/js/scripts.js';

\$element = \$this->field('markup')->value() ?? 'div';
if( strpos(\$element,'.') !== false )
{
    \$element = 'div';
}

\$arrImages = array();
\$arrImageSizes = array();
\$container = System::getContainer();
\$projectDir = \$container->getParameter('kernel.project_dir');
\$staticUrl = \$container->get('contao.assets.files_context')->getStaticUrl();\t\t
foreach(\$this->group('content') as \$i => \$fields)
{
\t\$arrImages[\$i] = \$this->field('image#'.\$i)->generate();
\t
\t\$file = FilesModel::findByPk( \$this->field('image#'.\$i)->value() );
\tif( \$file !== null )
\t{
\t\t\$tmp = StringUtil::deserialize( \$file->meta );
\t\tif( isset(\$tmp[ \$GLOBALS['TL_LANGUAGE'] ]) )
\t\t{
\t\t\t\$meta = \$tmp[ \$GLOBALS['TL_LANGUAGE'] ];
\t\t}
\t\tunset(\$tmp);
\t\t
\t\t\$size = StringUtil::deserialize( \$this->field('image#'.\$i)->option('size') );
\t\t// fallback image size
\t\tif( empty( \\array_filter(\$size) ) )
\t\t{
\t\t\t\$size = array('35','35','crop');
\t\t}
\t\t\$objPicture = \$container->get('contao.image.preview_factory')->createPreviewPicture(\$projectDir . '/' . \$file->path, \$size);
\t\t\$arrPictures[ \$i ] = \$objPicture; 
\t\t
\t\t\$sources = \$objPicture->getSources(\$projectDir, \$staticUrl);
\t\tif( \$objPicture !== null && !empty(\$sources) )
\t\t{
\t\t\t// look up prefered source image file (not media query)
\t\t\tforeach(\$sources ?: array() as \$data)
\t\t\t{
\t\t\t\tif( (isset(\$data['src']) && \$data['src']) != \$strImage && (!isset(\$data['media']) || strlen(\$data['media']) < 1) )
\t\t\t\t{
\t\t\t\t\t\$arrImages[\$i]= \$data['src'];
\t\t\t\t}
\t\t\t}
\t\t}
\t}
}
?>

<<?= \$element; ?> class=\"<?=  \$this->class; ?> ce_text_inline_images_<?= \$this->id; ?> <?= str_replace('.', '', \$this->field('markup')->value()); ?>\" data-align=\"<?= \$this->field('align')->value(); ?>\" data-color=\"<?= \$this->field('color')->value(); ?>\" data-speed=\"<?= \$this->field('speed')->value(); ?>\" data-style=\"<?= \$this->field('style')->value(); ?>\">
\t<?php foreach(\$this->group('content') as \$i => \$fields): ?>
\t\t<?php if(\$this->field('text#'.\$i)->value()): ?>
\t\t<span class=\"inline_text\"><?= \$this->field('text#'.\$i)->value(); ?></span>
\t\t<?php endif; ?>
\t\t<?php if( isset(\$arrImages[\$i]) && !empty(\$arrImages[\$i]) ): ?>
\t\t<?php 
\t\t\$arrImg = \$arrPictures[\$i]->getImg();
\t\t?>
\t\t<span class=\"inline_image inline_image_<?= \$i; ?>\" style=\"background-image: url(<?= \$arrImages[\$i]; ?>); min-width:<?= \$arrImg['width'].'px'; ?>; background-size:<?= \$arrImg['width'].'px'; ?>;\">&nbsp;</span>
\t\t<?php endif; ?>\t\t\t
\t<?php endforeach; ?>
</<?= \$element; ?>>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
    var element = jQuery('.ce_text_inline_images_<?= \$this->id; ?>');
    var waypoint = EX.fx.waypoint(element);
\tjQuery(element).on('intersecting',function(e,params)
\t{
        element.addClass('isInViewport');
    });
});
</script>  
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/customelements/customelement_text_inline_images.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_text_inline_images.html5");
    }
}
