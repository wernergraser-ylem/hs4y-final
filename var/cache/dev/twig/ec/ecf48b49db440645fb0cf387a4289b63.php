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

/* @pct_theme_templates/theme/fe_page_lightbox.html5 */
class __TwigTemplate_72dc0affd9c3189d570c2befcf7377d2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/fe_page_lightbox.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_theme_templates/theme/fe_page_lightbox.html5"));

        // line 1
        yield "<?php 
\$rootDir = \\Contao\\System::getContainer()->getParameter('kernel.project_dir');
?>
<!DOCTYPE html>
<html lang=\"<?php echo \$this->language; ?>\"<?php if (\$this->isRTL): ?> dir=\"rtl\"<?php endif; ?>>
<head>
<meta charset=\"<?php echo \$this->charset; ?>\">\t
<meta name=\"description\" content=\"<?php echo \$this->description; ?>\">
<meta name=\"keywords\" content=\"<?php echo \$this->keywords; ?>\"> 
<meta name=\"generator\" content=\"Contao Open Source CMS\">
<meta name=\"robots\" content=\"noindex, nofollow\">
<?php echo \$this->stylesheets; ?>
<?php if(\$this->pct_layout_css): ?>
<link id=\"layout_css\" rel=\"stylesheet preload\" as=\"style\" title=\"layout_css\" type=\"text/css\" href=\"<?php echo \$this->pct_layout_css; ?>\">
<?php endif; ?>\t
<?php if(filesize(\$rootDir.'/files/cto_layout/css/customize.css') > 0): ?>
<link rel=\"stylesheet preload\" as=\"style\" type=\"text/css\" href=\"files/cto_layout/css/customize.css?v=<?= \\filemtime(\$rootDir.'/files/cto_layout/css/customize.css'); ?>\">
<?php endif; ?>
</head>
<body>
<?php echo \$this->main; ?>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/theme/fe_page_lightbox.html5";
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
\$rootDir = \\Contao\\System::getContainer()->getParameter('kernel.project_dir');
?>
<!DOCTYPE html>
<html lang=\"<?php echo \$this->language; ?>\"<?php if (\$this->isRTL): ?> dir=\"rtl\"<?php endif; ?>>
<head>
<meta charset=\"<?php echo \$this->charset; ?>\">\t
<meta name=\"description\" content=\"<?php echo \$this->description; ?>\">
<meta name=\"keywords\" content=\"<?php echo \$this->keywords; ?>\"> 
<meta name=\"generator\" content=\"Contao Open Source CMS\">
<meta name=\"robots\" content=\"noindex, nofollow\">
<?php echo \$this->stylesheets; ?>
<?php if(\$this->pct_layout_css): ?>
<link id=\"layout_css\" rel=\"stylesheet preload\" as=\"style\" title=\"layout_css\" type=\"text/css\" href=\"<?php echo \$this->pct_layout_css; ?>\">
<?php endif; ?>\t
<?php if(filesize(\$rootDir.'/files/cto_layout/css/customize.css') > 0): ?>
<link rel=\"stylesheet preload\" as=\"style\" type=\"text/css\" href=\"files/cto_layout/css/customize.css?v=<?= \\filemtime(\$rootDir.'/files/cto_layout/css/customize.css'); ?>\">
<?php endif; ?>
</head>
<body>
<?php echo \$this->main; ?>
</body>
</html>", "@pct_theme_templates/theme/fe_page_lightbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/fe_page_lightbox.html5");
    }
}
