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

/* @pct_theme_templates/gallery/gallery_default_slider.html5 */
class __TwigTemplate_9fe9e368269a444832f055b483bf202e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_default_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/gallery/gallery_default_slider.html5"));

        // line 1
        yield "<?php 
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>
<div class=\"swiper-gallery-wrapper\" id=\"gallery_wrapper_<?= \$this->id; ?>\">
  <div class=\"swiper-container\" id=\"gallery_<?= \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">
    <ul class=\"swiper-wrapper\">
      <?php foreach (\$this->body as \$class => \$row) : ?>
        <?php foreach (\$row as \$col) : ?>
          <?php 
      foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
      {
        if( !isset(\$col->{\$f}) )
        {
          \$col->{\$f} = '';
        }
      }
      ?>
          <?php if (\$col->addImage): ?>
            <li class=\"entry swiper-slide\">
              <figure class=\"image_container\" itemscope itemtype=\"http://schema.org/ImageObject\">

                <?php \$this->insert('picture_default', \$col->picture); ?>

                <?php if (\$col->href) : ?>
                  <a href=\"<?= \$col->href; ?>\" <?= \$col->attributes; ?> title=\"<?= \$col->linkTitle ?: \$col->alt; ?>\" itemprop=\"contentUrl\">
                  <?php endif; ?>

                  <?php if (\$col->href || \$col->caption) : ?>
                    <div class=\"content\">
                      <div class=\"content-outside\">
                        <div class=\"content-inside\">
                          <div class=\"capt\" itemprop=\"caption\"><?= \$col->caption; ?></div>
                          <?php if (strlen(\$col->href) > 0 && strlen(\$col->caption) < 1) : ?>
                            <i class=\"fa fa-plus-circle fa-3x\"></i>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if (\$col->href) : ?>
                  </a>
                <?php endif; ?>

              </figure>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </ul>
    <div class=\"swiper-pagination swiper-pagination_<?= \$this->id; ?>\"></div>
    <div class=\"swiper-button-prev swiper-button-prev_<?= \$this->id; ?>\"></div>
    <div class=\"swiper-button-next swiper-button-next_<?= \$this->id; ?>\"></div>
  </div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(document).ready(function() 
  {
\tvar html = jQuery('#gallery_wrapper_<?= \$this->id; ?>').html();
\tvar options = 
\t{
      pagination: {
        el: '.swiper-pagination_<?= \$this->id; ?>',
        clickable: true,
      },
      navigation: {
      nextEl: '.swiper-button-next_<?= \$this->id; ?>',
      prevEl: '.swiper-button-prev_<?= \$this->id; ?>',
    },
      slidesPerView: <?= \$this->perRow; ?>,
      spaceBetween: 0,
      grabCursor: false,
      breakpoints: {
        10: {
          slidesPerView: 2,
          spaceBetween: 0
        },
        768: {
          slidesPerView: <?= \$this->perRow; ?>,
          spaceBetween: 0
        }
      }
     };

   var swiper = new Swiper('#gallery_<?= \$this->id; ?>', options);
   
    // reinitialize gallery slider on lightbox close
    jQuery(document).bind('cbox_closed', function() 
    {
      jQuery('#gallery_<?= \$this->id; ?>').remove();
      jQuery('#gallery_wrapper_<?= \$this->id; ?>').append(html);
      var swiper = new Swiper('#gallery_<?= \$this->id; ?>', options);

      jQuery('#gallery_<?= \$this->id; ?> a[data-lightbox]').map(function() {
        jQuery(this).colorbox({
          // Put custom options here
          loop: false,
          rel: jQuery(this).attr('data-lightbox'),
          maxWidth: '95%',
          maxHeight: '95%'
        });
      });
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
        return "@pct_theme_templates/gallery/gallery_default_slider.html5";
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/swiper/swiper.jquery.min.js|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/swiper/swiper.min.css|static';
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/gallery/ce_gallery.css|static';
?>
<div class=\"swiper-gallery-wrapper\" id=\"gallery_wrapper_<?= \$this->id; ?>\">
  <div class=\"swiper-container\" id=\"gallery_<?= \$this->id; ?>\" itemscope itemtype=\"http://schema.org/ImageGallery\">
    <ul class=\"swiper-wrapper\">
      <?php foreach (\$this->body as \$class => \$row) : ?>
        <?php foreach (\$row as \$col) : ?>
          <?php 
      foreach(array('href','caption','class','margin','linkTitle','attributes','alt','addImage') as \$f)
      {
        if( !isset(\$col->{\$f}) )
        {
          \$col->{\$f} = '';
        }
      }
      ?>
          <?php if (\$col->addImage): ?>
            <li class=\"entry swiper-slide\">
              <figure class=\"image_container\" itemscope itemtype=\"http://schema.org/ImageObject\">

                <?php \$this->insert('picture_default', \$col->picture); ?>

                <?php if (\$col->href) : ?>
                  <a href=\"<?= \$col->href; ?>\" <?= \$col->attributes; ?> title=\"<?= \$col->linkTitle ?: \$col->alt; ?>\" itemprop=\"contentUrl\">
                  <?php endif; ?>

                  <?php if (\$col->href || \$col->caption) : ?>
                    <div class=\"content\">
                      <div class=\"content-outside\">
                        <div class=\"content-inside\">
                          <div class=\"capt\" itemprop=\"caption\"><?= \$col->caption; ?></div>
                          <?php if (strlen(\$col->href) > 0 && strlen(\$col->caption) < 1) : ?>
                            <i class=\"fa fa-plus-circle fa-3x\"></i>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if (\$col->href) : ?>
                  </a>
                <?php endif; ?>

              </figure>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </ul>
    <div class=\"swiper-pagination swiper-pagination_<?= \$this->id; ?>\"></div>
    <div class=\"swiper-button-prev swiper-button-prev_<?= \$this->id; ?>\"></div>
    <div class=\"swiper-button-next swiper-button-next_<?= \$this->id; ?>\"></div>
  </div>
</div>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(document).ready(function() 
  {
\tvar html = jQuery('#gallery_wrapper_<?= \$this->id; ?>').html();
\tvar options = 
\t{
      pagination: {
        el: '.swiper-pagination_<?= \$this->id; ?>',
        clickable: true,
      },
      navigation: {
      nextEl: '.swiper-button-next_<?= \$this->id; ?>',
      prevEl: '.swiper-button-prev_<?= \$this->id; ?>',
    },
      slidesPerView: <?= \$this->perRow; ?>,
      spaceBetween: 0,
      grabCursor: false,
      breakpoints: {
        10: {
          slidesPerView: 2,
          spaceBetween: 0
        },
        768: {
          slidesPerView: <?= \$this->perRow; ?>,
          spaceBetween: 0
        }
      }
     };

   var swiper = new Swiper('#gallery_<?= \$this->id; ?>', options);
   
    // reinitialize gallery slider on lightbox close
    jQuery(document).bind('cbox_closed', function() 
    {
      jQuery('#gallery_<?= \$this->id; ?>').remove();
      jQuery('#gallery_wrapper_<?= \$this->id; ?>').append(html);
      var swiper = new Swiper('#gallery_<?= \$this->id; ?>', options);

      jQuery('#gallery_<?= \$this->id; ?> a[data-lightbox]').map(function() {
        jQuery(this).colorbox({
          // Put custom options here
          loop: false,
          rel: jQuery(this).attr('data-lightbox'),
          maxWidth: '95%',
          maxHeight: '95%'
        });
      });
    });

  });
</script>
<!-- SEO-SCRIPT-STOP -->", "@pct_theme_templates/gallery/gallery_default_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/gallery/gallery_default_slider.html5");
    }
}
