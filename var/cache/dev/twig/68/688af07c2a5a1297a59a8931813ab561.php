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

/* @pct_frontend_quickedit/modules/mod_backendlogin.html5 */
class __TwigTemplate_53ce32d1d64bf81d1c34b9e00d44ebaf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/modules/mod_backendlogin.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_frontend_quickedit/modules/mod_backendlogin.html5"));

        // line 1
        yield "
<div class=\"<?= \$this->class; ?>\">
<?php if (!BE_USER_LOGGED_IN && !\$this->hasAuthenticatedBackendUser()): ?>
<a href=\"<?= \$this->href; ?>\" class=\"<?= \$this->selector; ?>\" title=\"Backend-Login\">Backend-Login</a>
<script>
jQuery(document).ready(function()
{
\tvar login_success = false;
\tjQuery(\".<?= \$this->selector; ?>\").colorbox(
\t{
\t\tiframe:true,
\t\tinnerWidth:\"50%\", 
\t\tinnerHeight:\"70%\", 
\t\tmaxWidth:\"95%\",
\t\tmaxHeight:'95%', 
\t\thref: \"<?= \$this->lb_href; ?>\",
\t\tonComplete: function()
\t\t{
\t\t\tjQuery(\"#cboxLoadedContent iframe\").on('load', function()
\t\t\t{
\t\t\t\tif( jQuery(this).contents().find('body').html() == 'login_success' )
\t\t\t\t{
\t\t\t\t\tlogin_success = true;
\t\t\t\t\tjQuery(\".<?= \$this->selector; ?>\").colorbox.close();
\t\t\t\t}
\t\t\t});
\t\t},
\t\tonClosed: function()
\t\t{
\t\t\tif( login_success )
\t\t\t{
\t\t\t\t<?php if( \$this->redirect ): ?>
\t\t\t\twindow.location.href = '<?= \$this->redirect; ?>';
\t\t\t\t<?php else: ?>
\t\t\t\tlocation.reload();
\t\t\t\t<?php endif; ?>
\t\t\t}
\t\t}
\t});
});
</script>
<?php else: ?>
<p class=\"info\">
<a href=\"<?= \$this->href; ?>\" target=\"_blank\" class=\"<?= \$this->selector; ?> logout\" title=\"Backend-Logout\">Backend-Logout</a>
<script>
jQuery(document).ready(function() 
{
\tjQuery(\".<?= \$this->selector; ?>.logout\").click(function(e) 
\t{
\t\te.preventDefault();
\t\tjQuery.ajax(
\t\t{
\t\t \turl: '<?= \$this->href; ?>',
\t\t \tsuccess: function(event)
\t\t\t{
\t\t\t\twindow.location.href = '<?= \$this->redirect; ?>';
\t\t\t}
\t\t});
\t});
});
</script>
</p>
<?php endif; ?>
</div>
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
        return "@pct_frontend_quickedit/modules/mod_backendlogin.html5";
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
<div class=\"<?= \$this->class; ?>\">
<?php if (!BE_USER_LOGGED_IN && !\$this->hasAuthenticatedBackendUser()): ?>
<a href=\"<?= \$this->href; ?>\" class=\"<?= \$this->selector; ?>\" title=\"Backend-Login\">Backend-Login</a>
<script>
jQuery(document).ready(function()
{
\tvar login_success = false;
\tjQuery(\".<?= \$this->selector; ?>\").colorbox(
\t{
\t\tiframe:true,
\t\tinnerWidth:\"50%\", 
\t\tinnerHeight:\"70%\", 
\t\tmaxWidth:\"95%\",
\t\tmaxHeight:'95%', 
\t\thref: \"<?= \$this->lb_href; ?>\",
\t\tonComplete: function()
\t\t{
\t\t\tjQuery(\"#cboxLoadedContent iframe\").on('load', function()
\t\t\t{
\t\t\t\tif( jQuery(this).contents().find('body').html() == 'login_success' )
\t\t\t\t{
\t\t\t\t\tlogin_success = true;
\t\t\t\t\tjQuery(\".<?= \$this->selector; ?>\").colorbox.close();
\t\t\t\t}
\t\t\t});
\t\t},
\t\tonClosed: function()
\t\t{
\t\t\tif( login_success )
\t\t\t{
\t\t\t\t<?php if( \$this->redirect ): ?>
\t\t\t\twindow.location.href = '<?= \$this->redirect; ?>';
\t\t\t\t<?php else: ?>
\t\t\t\tlocation.reload();
\t\t\t\t<?php endif; ?>
\t\t\t}
\t\t}
\t});
});
</script>
<?php else: ?>
<p class=\"info\">
<a href=\"<?= \$this->href; ?>\" target=\"_blank\" class=\"<?= \$this->selector; ?> logout\" title=\"Backend-Logout\">Backend-Logout</a>
<script>
jQuery(document).ready(function() 
{
\tjQuery(\".<?= \$this->selector; ?>.logout\").click(function(e) 
\t{
\t\te.preventDefault();
\t\tjQuery.ajax(
\t\t{
\t\t \turl: '<?= \$this->href; ?>',
\t\t \tsuccess: function(event)
\t\t\t{
\t\t\t\twindow.location.href = '<?= \$this->redirect; ?>';
\t\t\t}
\t\t});
\t});
});
</script>
</p>
<?php endif; ?>
</div>
", "@pct_frontend_quickedit/modules/mod_backendlogin.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_frontend_quickedit/templates/modules/mod_backendlogin.html5");
    }
}
