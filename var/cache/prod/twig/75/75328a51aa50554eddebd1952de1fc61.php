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
class __TwigTemplate_ad4b245d7b453fba635cc50101101eee extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_templates/theme/j_tablesort.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/j_tablesort.html5");
    }
}
