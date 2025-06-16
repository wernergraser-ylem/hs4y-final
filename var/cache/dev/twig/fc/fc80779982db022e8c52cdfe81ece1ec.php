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
class __TwigTemplate_a1c9f18793de85c1ec898549e4ff997e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/js_slider.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/js_slider.html5"));

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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?php

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
", "@pct_theme_templates/theme/js_slider.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/js_slider.html5");
    }
}
