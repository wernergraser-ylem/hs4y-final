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
class __TwigTemplate_b1ce15f8c2d111184f62e38855921f70 extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_theme_templates/theme/fe_page_lightbox.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/theme/fe_page_lightbox.html5");
    }
}
