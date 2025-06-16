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

/* @pct_theme_settings/license/be_license_banner.html5 */
class __TwigTemplate_64d668249c66fc6b06ac8e38311f85f1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/license/be_license_banner.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_settings/license/be_license_banner.html5"));

        // line 1
        yield "<?php if( \$this->hasAuthenticatedBackendUser() ): ?>
<div class=\"tl_error\" id=\"license_banner\">
\t<?php if( empty(\$this->pct_license) ): ?>
\t<span><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_info']; ?></span>
\t<form method=\"post\">
\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"PCT_LICENSE\">
\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$this->request_token; ?>\">
\t\t<label for=\"license\"><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_label']; ?></label> 
\t\t<input type=\"number\" maxlength=\"10\" name=\"license\" required>
\t\t<div class=\"submit_container pct_license_field\">
\t\t\t<button class=\"tl_submit\"><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_submit']; ?></button>
\t\t</div>
\t</form>
\t<?php else: ?>
\t<p><?= sprintf(\$GLOBALS['TL_LANG']['MSC']['pct_license'], \$this->pct_license); ?></p>
\t<?php endif; ?>
\t<span><?= \$GLOBALS['TL_LANG']['EXP']['website_locked']; ?></span>
\t<form method=\"post\">
\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"UNLOCK\">
\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$this->request_token; ?>\">
\t\t<button class=\"tl_submit\"><?= \$GLOBALS['TL_LANG']['EXP']['website_unlock']; ?></button>
\t</form>
</div>
<style>
   #license_banner {padding: 10px 20px 20px 45px; margin-bottom: 35px;}
   #license_banner button {padding: 5px; color: #444;}
   #license_banner label {color: #444;}
   #license_banner form {margin-top: 20px;}
   #license_banner input[type=\"number\"] {width: 120px; padding: 2px; color: #444;}
   #license_banner .submit_container {margin-bottom: 35px;}
   #license_banner .pct_license_field {margin-top: 10px;}
</style>
<?php endif; ?>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_settings/license/be_license_banner.html5";
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
        return new Source("<?php if( \$this->hasAuthenticatedBackendUser() ): ?>
<div class=\"tl_error\" id=\"license_banner\">
\t<?php if( empty(\$this->pct_license) ): ?>
\t<span><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_info']; ?></span>
\t<form method=\"post\">
\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"PCT_LICENSE\">
\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$this->request_token; ?>\">
\t\t<label for=\"license\"><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_label']; ?></label> 
\t\t<input type=\"number\" maxlength=\"10\" name=\"license\" required>
\t\t<div class=\"submit_container pct_license_field\">
\t\t\t<button class=\"tl_submit\"><?= \$GLOBALS['TL_LANG']['EXP']['pct_license_submit']; ?></button>
\t\t</div>
\t</form>
\t<?php else: ?>
\t<p><?= sprintf(\$GLOBALS['TL_LANG']['MSC']['pct_license'], \$this->pct_license); ?></p>
\t<?php endif; ?>
\t<span><?= \$GLOBALS['TL_LANG']['EXP']['website_locked']; ?></span>
\t<form method=\"post\">
\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"UNLOCK\">
\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$this->request_token; ?>\">
\t\t<button class=\"tl_submit\"><?= \$GLOBALS['TL_LANG']['EXP']['website_unlock']; ?></button>
\t</form>
</div>
<style>
   #license_banner {padding: 10px 20px 20px 45px; margin-bottom: 35px;}
   #license_banner button {padding: 5px; color: #444;}
   #license_banner label {color: #444;}
   #license_banner form {margin-top: 20px;}
   #license_banner input[type=\"number\"] {width: 120px; padding: 2px; color: #444;}
   #license_banner .submit_container {margin-bottom: 35px;}
   #license_banner .pct_license_field {margin-top: 10px;}
</style>
<?php endif; ?>", "@pct_theme_settings/license/be_license_banner.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_settings/templates/license/be_license_banner.html5");
    }
}
