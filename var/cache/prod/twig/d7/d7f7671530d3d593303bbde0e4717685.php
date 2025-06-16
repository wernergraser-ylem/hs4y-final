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

/* @pct_theme_templates/theme/js_slider.html5 */
class __TwigTemplate_8efda4683d963edcd668867c859bb0d2 extends Template
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

// Add the swipe style sheet
\$GLOBALS['TL_CSS'][] = 'assets/swipe/css/swipe.min.css'.(\\PCT\\SEO::getProtocol() == 'http2' ? '' : '|static');
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'assets/swipe/js/swipe.min.js';
?>
<!-- SEO-SCRIPT-START -->
<script>
jQuery(document).ready(function()  
{
    //var e = document.querySelectorAll('.content-slider, .slider-control');
    jQuery('.content-slider').each(function(i,elem) 
    {
\t    var config = jQuery(elem).attr('data-config');
\t   \tif( config )
\t    {
\t\t    var menu = jQuery(elem).next('.slider-control');
\t\t    c = config.split(',');
\t\t    var options = 
\t\t    {
\t\t\t    'auto': parseInt(c[0]),
\t\t        'speed': parseInt(c[1]),
\t\t        'startSlide': parseInt(c[2]),
\t\t        'continuous': parseInt(c[3])
\t\t    }
\t\t    // menu
\t\t    if ( menu )
\t\t    {
\t\t\t    // replace # with slahs
\t\t\t    menu.find('a').attr('href','/');
\t\t\t    options.menu = menu[0];
\t\t    }
\t\t    new Swipe(elem, options);
\t     }
      });
});
</script>
<!-- SEO-SCRIPT-STOP -->
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/theme/js_slider.html5";
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
        return new Source("", "@pct_theme_templates/theme/js_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/js_slider.html5");
    }
}
