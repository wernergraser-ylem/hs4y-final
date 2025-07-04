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
class __TwigTemplate_34a6fbbb9109cae20b644983c5099d89 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_page_import.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_page_import.html5"));

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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
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
</div>", "@pct_customelements/backend/be_page_import.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_page_import.html5");
    }
}
