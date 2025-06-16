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

/* @pct_theme_templates/theme/j_colorbox.html5 */
class __TwigTemplate_3fc5a808e65ecbbe5225e5dbd012bf16 extends Template
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

// Add the colorbox style sheet
\$GLOBALS['TL_CSS'][] = 'assets/colorbox/css/colorbox.min.css'.(\\PCT\\SEO::getProtocol() == 'http2' ? '' : '|static');
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'assets/colorbox/js/colorbox.min.js';
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()  {
    jQuery('a[data-lightbox]').map(function() 
    {
      jQuery(this).colorbox(
      {
        // Put custom options here
        loop: false,
        rel: jQuery(this).attr('data-lightbox'),
        maxWidth: '95%',
        maxHeight: '95%'
      });
   });

    jQuery(document).bind('cbox_complete', function(e)
    {
        if( jQuery.colorbox == undefined )
        {
          return;
        }
        var text = jQuery.colorbox.element().next('.caption').text();
        if( text )
        {
          var caption = jQuery('#cboxBottomLeft').append('<div id=\"cboxCaption\">'+text+'</div>');
          jQuery('#colorbox').height( jQuery('#colorbox').height() + caption.height()  );
        }
    });
  });
</script>
<script>
// iframe lightbox
jQuery(document).ready(function()  
{
  jQuery('a[data-lightbox-iframe]').map(function() 
  {
    jQuery(this).colorbox(
    {
        iframe:true, 
        innerWidth:\"80%\", 
        innerHeight:\"56%\", 
        maxWidth:\"95%\",
        maxHeight:'95%',
    });
  });
});

// lightbox 50% 50%
jQuery(document).ready(function() 
{
  jQuery('.lightbox50-50 a, a.lightbox50-50').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '50%',
      height: '50%'
    });
});
// lightbox 60% 40%
jQuery(document).ready(function() 
{
  jQuery('.lightbox60-40 a, a.lightbox60-40').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '60%',
      height: '40%'
    });
});
// lightbox 960px 575px
jQuery(document).ready(function() 
{
  jQuery('.lightbox960 a, a.lightbox960').colorbox(
    {
      // Put custom options here
      loop: false,
      rel: jQuery(this).attr('data-lightbox'),
      width: '960px',
      height: '575px'
    });
});
</script>
<!-- SEO-SCRIPT-STOP -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/theme/j_colorbox.html5";
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
        return new Source("", "@pct_theme_templates/theme/j_colorbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/j_colorbox.html5");
    }
}
