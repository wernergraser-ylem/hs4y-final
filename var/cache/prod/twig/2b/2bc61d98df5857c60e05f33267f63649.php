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

/* @pct_customelements/backend/be_page_import.html5 */
class __TwigTemplate_5e6831c5359ad1a62b2289401ee02efb extends Template
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
        yield "
<div id=\"page_import\">
<div id=\"tl_buttons\">
<?php echo \$this->back; ?>
</div>

<form action=\"<?php echo \$this->action; ?>\" method=\"post\">
<div class=\"body\">
\t<h2 class=\"headline\"><?php echo \$GLOBALS['TL_LANG']['page_import']['headline']; ?></h2>
\t
\t<?php if(\$this->hasError): ?>
\t<p class=\"tl_red\"><?php echo \$this->error; ?></p>
\t<?php else: ?>
\t\t<?php if(\$this->imported): ?>
\t\t\t<p class=\"tl_green\"><?php echo \$GLOBALS['TL_LANG']['page_import']['headline_success']; ?></p>
\t\t\t<ul class=\"success\">
\t\t\t<?php foreach(\$this->imported as \$text): ?>
\t\t\t<li class=\"tl_green\"><?php echo \$text; ?></li>
\t\t\t<?php endforeach; ?>
\t\t\t</ul>
\t\t<?php endif; ?>
\t<?php endif; ?>
\t
\t<div class=\"formbody\">
\t\t<div><?php echo \$this->selectionMenu; ?></div>
\t</div>
</div>

<div class=\"tl_formbody_submit\">
<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?php echo \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
\t<div class=\"tl_submit_container\">
\t\t<input id=\"run\" type=\"submit\" name=\"run_import\" value=\"<?php echo \$this->import_value; ?>\">
\t</div>
</div>
</form>
\t
</div>";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_customelements/backend/be_page_import.html5";
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
        return new Source("", "@pct_customelements/backend/be_page_import.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_page_import.html5");
    }
}
