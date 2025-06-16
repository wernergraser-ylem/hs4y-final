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

/* @pct_theme_templates/customelements/customelement_fancybox.html5 */
class __TwigTemplate_b9c00d73dd8cad01109eb159158f8ef3 extends Template
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
\$GLOBALS['TL_CSS'][] = 'files/cto_layout/css/customelements/ce_fancybox.css|static';
?>

<?php if(\$this->field('style')->value() == 'style1'): ?>
<div class=\"<?=  \$this->class; ?> <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('color')->value(); ?> <?php echo \$this->field('border_radius')->value(); ?>\"<?php if (\$this->field('bg_image')->value()): ?> style=\"background-image: url(<?php echo \$this->field('bg_image')->generate(); ?>);\"<?php endif; ?><?php echo \$this->cssID; ?>>
   <div class=\"overlay\"></div>
   <?php if (\$this->field('link')->value()): ?><?php echo \$this->field('link')->html(); ?><?php endif; ?>
   <div class=\"inside\">
      <div class=\"content\"<?php if (\$this->field('min_height')->value()): ?> style=\"min-height:<?php echo \$this->field('min_height')->value(); ?><?php echo \$this->field('min_height_unit')->value() ?: 'px'; ?>\"<?php endif; ?>>
         <div class=\"icon\"><?php if (\$this->field('icon')->value()): ?><?php echo \$this->field('icon')->html(); ?><?php endif; ?></div>
         <div class=\"text\">
\t         <?php if (\$this->field('headline')->value()): ?><?php echo \$this->field('headline')->html(); ?><?php endif; ?>
\t\t\t <?php if (\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
         </div>
      </div>
      <?php if (\$this->field('link')->value()): ?><div class=\"link_text\"><?php echo \$this->field('link')->option('titleText'); ?><span></span></div><?php endif; ?>
   </div>
</div>
<?php endif; ?>

<?php if(\$this->field('style')->value() == 'style2'): ?>
<div class=\"<?=  \$this->class; ?> <?php echo \$this->field('style')->value(); ?> ce_fancybox_<?= \$this->id; ?> <?php echo \$this->field('color')->value(); ?> <?php echo \$this->field('border_radius')->value(); ?>\" style=\"background-image: url(<?php echo \$this->field('bg_image')->generate(); ?>);<?php if (\$this->field('min_height')->value()): ?>min-height:<?php echo \$this->field('min_height')->value(); ?><?php echo \$this->field('min_height_unit')->value() ?: 'px'; ?><?php endif; ?>\"<?php echo \$this->cssID; ?>>
   <div class=\"overlay\"></div>
   <?php if (\$this->field('link')->value()): ?><?php echo \$this->field('link')->html(); ?><?php endif; ?>
   <div class=\"inside\">
      <div class=\"headline_wrap\">
         <?php if (\$this->field('icon')->value()): ?><?php echo \$this->field('icon')->html(); ?><?php endif; ?>
         <?php if (\$this->field('headline')->value()): ?><?php echo \$this->field('headline')->html(); ?><?php endif; ?>
      </div>
      <div class=\"text\">
         <?php if (\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
         <?php if (\$this->field('link')->option('titleText')): ?><div class=\"link_text\"><?php echo \$this->field('link')->option('titleText'); ?><span></span></div><?php endif; ?>
      </div>
      <?php 
\t  \$GLOBALS['TL_HEAD'][] = '<style>
\t  \t:root{--ce_fancybox_'.\$this->id.': 0px;}
\t  \t.ce_fancybox_'.\$this->id.':hover .headline_wrap {transform: translateY( calc(-1 * var(--ce_fancybox_'.\$this->id.')) );}
\t  </style>';
\t  ?>
      <script>
      jQuery(document).ready(function() 
      {
\t      jQuery(':root').css( {'--ce_fancybox_<?= \$this->id; ?>': jQuery('.ce_fancybox_<?= \$this->id; ?> .text').height()  +'px'} );
      });
\t  // fancybox inside interactive elements like tabs, accordions
\t  jQuery('.ce_tabs li, .ce_accordion .toggler').click(function()
      {
\t      setTimeout(function()
\t      {
\t\t      jQuery(':root').css( {'--ce_fancybox_<?= \$this->id; ?>': jQuery('.ce_fancybox_<?= \$this->id; ?> .text').height()  +'px'} );
\t      }, 200);
      });
      </script>
   </div>
</div>
<?php endif; ?>


<?php if(\$this->field('style')->value() == 'style3'): ?>
<?php
#\$GLOBALS['TL_HEAD'][] = '<script src=\"'.files/cto_layout/scripts/atropos/atropos.js\" type=\"module\"></script>';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'files/cto_layout/scripts/atropos/atropos.js';

\$GLOBALS['TL_CSS'][] = 'files/cto_layout/scripts/atropos/atropos.css';
?>
   <div class=\"<?=  \$this->class; ?> atropos atropos_<?= \$this->id; ?> <?php echo \$this->field('style')->value(); ?> <?php echo \$this->field('color')->value(); ?> <?php echo \$this->field('border_radius')->value(); ?><?php if (\$this->field('link')->value()): ?> clickable<?php endif; ?>\"<?php echo \$this->cssID; ?>>
      <div class=\"atropos-scale\">
         <div class=\"atropos-rotate\">
            <div class=\"atropos-inner\">
               <?php if (\$this->field('link')->value()): ?><?php echo \$this->field('link')->html(); ?><?php endif; ?>
               <div class=\"inside\" style=\"background-image: url(<?php echo \$this->field('bg_image')->generate(); ?>);<?php if (\$this->field('min_height')->value()): ?> min-height:<?php echo \$this->field('min_height')->value(); ?><?php echo \$this->field('min_height_unit')->value() ?: 'px'; ?><?php endif; ?>\">
                  <div class=\"overlay\"></div>
                  <div class=\"content\" data-atropos-offset=\"5\">
                   <?php if (\$this->field('icon')->value()): ?><?php echo \$this->field('icon')->html(); ?><?php endif; ?>
                   <?php if (\$this->field('headline')->value()): ?><?php echo \$this->field('headline')->html(); ?><?php endif; ?>
                   <?php if (\$this->field('text')->value()): ?><?php echo \$this->field('text')->html(); ?><?php endif; ?>
                  </div>
              <?php if (\$this->field('link')->option('titleText')): ?><div class=\"link_text\" data-atropos-offset=\"10\"><?php echo \$this->field('link')->option('titleText'); ?><span></span></div><?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function() 
{
   if( !jQuery('body').hasClass('mobile') )
   {
      var api = Atropos(
      {
         el: '.atropos_<?= \$this->id; ?>',
         shadow: true,
         shadowScale: 0.9,
      });
   }

   jQuery('.atropos_<?= \$this->id; ?>.clickable .inside').click(function() 
   {
      location.href = jQuery('.atropos_<?= \$this->id; ?> a').attr('href');
   });
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
        return "@pct_theme_templates/customelements/customelement_fancybox.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_fancybox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_fancybox.html5");
    }
}
