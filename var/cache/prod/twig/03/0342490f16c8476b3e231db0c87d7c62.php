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

/* @pct_themer/themedesigner/themedesigner.html5 */
class __TwigTemplate_4f9913ae9c3f2dd86d9da7553a27a1b2 extends Template
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
/**
 * ThemeDesigner
 *
 * @var string \"type\"\t'navigation'||'themedesigner||versions'
 */
?>

<?php 
global \$objPage;
if(!\$objPage->hasJQuery)
{\t
\t// load jquery
\t\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/jquery/jquery.min.js';
}
\$GLOBALS['TL_JAVASCRIPT'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/jquery-ui.min.js';
\$GLOBALS['TL_CSS'][] = PCT_THEMER_PATH.'/assets/js/jquery/ui/themes/base/jquery-ui.css';\t
?>

<!-- indexer::stop -->

<div class=\"pct_<?= \$this->type; ?>\">
<?= \$this->content; ?>
</div>
<!-- indexer::continue -->";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/themedesigner.html5";
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
        return new Source("", "@pct_themer/themedesigner/themedesigner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/themedesigner.html5");
    }
}
