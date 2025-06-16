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

/* @pct_theme_templates/theme/j_accordion.html5 */
class __TwigTemplate_f2535ce50b90b1a0614f2194519d662a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/j_accordion.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/j_accordion.html5"));

        // line 1
        yield "<?php
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'assets/jquery-ui/js/jquery-ui.min.js';
?>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(function(\$) 
  {
  \tif( !jQuery('body').hasClass('acc_disable_animations') )
\t{
\t\tjQuery(document).accordion({
\t      // Put custom options here
\t      heightStyle: 'content',
\t      header: '.toggler',
\t      collapsible: true,
\t      create: function(event, ui) {
\t        ui.header.addClass('active');
\t        jQuery('.toggler').attr('tabindex', 0);
\t      },
\t      activate: function(event, ui) {
\t        ui.newHeader.addClass('active');
\t        ui.oldHeader.removeClass('active');
\t        jQuery('.toggler').attr('tabindex', 0);
\t      }
\t    });
    }
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
        return "@pct_theme_templates/theme/j_accordion.html5";
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
\$GLOBALS['SEO_SCRIPTS_FILE'][] = 'assets/jquery-ui/js/jquery-ui.min.js';
?>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(function(\$) 
  {
  \tif( !jQuery('body').hasClass('acc_disable_animations') )
\t{
\t\tjQuery(document).accordion({
\t      // Put custom options here
\t      heightStyle: 'content',
\t      header: '.toggler',
\t      collapsible: true,
\t      create: function(event, ui) {
\t        ui.header.addClass('active');
\t        jQuery('.toggler').attr('tabindex', 0);
\t      },
\t      activate: function(event, ui) {
\t        ui.newHeader.addClass('active');
\t        ui.oldHeader.removeClass('active');
\t        jQuery('.toggler').attr('tabindex', 0);
\t      }
\t    });
    }
  });
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/theme/j_accordion.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/j_accordion.html5");
    }
}
