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

/* @pct_theme_templates/theme/j_tablesort.html5 */
class __TwigTemplate_a1ab92a1c7edb19c1622ce244238585c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/j_tablesort.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/j_tablesort.html5"));

        // line 1
        yield "<?php
// Add the tablesorter style sheet
\$GLOBALS['TL_CSS'][] = 'assets/tablesorter/css/tablesorter.min.css|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$this->asset('js/tablesorter.min.js', 'contao-components/tablesorter');
?>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(function(\$) {
    jQuery('.ce_table .sortable').each(function(i, table) {
      var attr = jQuery(table).attr('data-sort-default'),
          opts = {}, s;

      if (attr) {
        s = attr.split('|');
        opts = { sortList: [[s[0], s[1] == 'desc' | 0]] };
      }

      jQuery(table).tablesorter(opts);
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
        return "@pct_theme_templates/theme/j_tablesort.html5";
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
// Add the tablesorter style sheet
\$GLOBALS['TL_CSS'][] = 'assets/tablesorter/css/tablesorter.min.css|static';
\$GLOBALS['SEO_SCRIPTS_FILE'][] = \$this->asset('js/tablesorter.min.js', 'contao-components/tablesorter');
?>
<!-- SEO-SCRIPT-START -->
<script>
  jQuery(function(\$) {
    jQuery('.ce_table .sortable').each(function(i, table) {
      var attr = jQuery(table).attr('data-sort-default'),
          opts = {}, s;

      if (attr) {
        s = attr.split('|');
        opts = { sortList: [[s[0], s[1] == 'desc' | 0]] };
      }

      jQuery(table).tablesorter(opts);
    });
  });
</script>
<!-- SEO-SCRIPT-STOP -->
", "@pct_theme_templates/theme/j_tablesort.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/j_tablesort.html5");
    }
}
