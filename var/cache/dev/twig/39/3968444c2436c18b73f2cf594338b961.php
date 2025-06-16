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

/* @pct_themer/backend/be_pct_demoinstaller.html5 */
class __TwigTemplate_b761f9a133867fce3e48f0a9b477f3e3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/backend/be_pct_demoinstaller.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_themer/backend/be_pct_demoinstaller.html5"));

        // line 1
        yield "<?php 
\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>

<div id=\"pct_demoinstaller\" class=\"contao-ht35\">
\t<!-- category select -->
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t
\t<div class=\"tl_formbody\">
\t\t<div class=\"tl_panel categories\">
\t\t<div class=\"float_box\"><?= \$this->categoryWidget; ?></div>
\t\t<div class=\"float_box\">
\t\t\t<?php 
\t\t\t\$img_reload = 'system/themes/flexible/icons/filter-apply.svg';
\t\t\t?>
\t\t\t<input type=\"image\" name=\"filter\" id=\"filter\" src=\"<?= \$img_reload; ?>\" class=\"tl_img_submit\" alt=\"ok\">
\t\t</div>
\t\t<div class=\"clear\"></div>
\t\t</div>
\t</div>
\t</form>
\t
\t<div id=\"tl_buttons\">
\t  <a href=\"<?= \$this->href ?>\" class=\"header_back\" title=\"<?= \$this->title ?>\"><?= \$this->button ?></a>
\t</div>
\t
\t<?php if(\$this->contaoThemeWidget): ?>
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t<div id=\"contao_theme_select\">
\t\t<?= \$this->contaoThemeWidget; ?>
\t</div>
\t</form>
\t<?php endif;?>
\t
\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>
\t
\t<div class=\"content_wrapper form_wrapper\">
\t\t<div class=\"counter\"><?= sprintf(\$GLOBALS['TL_LANG']['pct_demoinstaller']['counter'],count(\$this->themes)); ?></div>
\t\t
\t\t<div class=\"inside grid_wrapper\">
\t\t<?php foreach(\$this->themes as \$theme => \$data): ?>
\t\t<div id=\"<?= \$theme; ?>\" class=\"<?= \$data['class']; ?> block <?php if(\$data['installed']): ?> installed<?php endif; ?>\">
\t\t\t<div class=\"inside\">
\t\t\t\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_demoinstaller\">
\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t<input type=\"hidden\" name=\"THEME\" value=\"<?= \$theme; ?>\">
\t\t\t\t<div class=\"content<?php if(\$data['installed']): ?> demo_installed<?php endif; ?>\">
\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t<?php if(\$data['installed']): ?>
\t\t\t\t\t\t<a href=\"<?= \$data['feRedirect']; ?>\" target=\"_blank\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['target'][0]; ?>\">
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t<?php if(\$data['installed']): ?>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t<?php if(!\$data['installed']): ?>
\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"di_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_demoinstaller']['submit_install'] ?: 'Install'; ?>\"></div>
\t\t\t\t\t\t<?php else: ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t\$label = \$this->showLabel;
\t\t\t\t\t\tif(\$data['installed'] && (boolean)\\Contao\\Config::get('pct_themedesigner_hidden') === false)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$label = \$this->customizeLabel;
\t\t\t\t\t\t}
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div class=\"submit show\"><a href=\"<?php if(\$data['installed']): ?><?= \$data['feRedirect']; ?><?php endif; ?>\" target=\"_blank\" class=\"di_submit text\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['target'][0]; ?>\"><?= \$label; ?></a></div>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<div class=\"submit preview\"><a href=\"<?= \$data['link']; ?>\" target=\"_blank\" tile=\"Preview: <?= \$data['label']; ?>\"><?= \$GLOBALS['TL_LANG']['pct_demoinstaller']['submit_preview']; ?></a></div>\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t\t<?php endforeach; ?>
\t\t
\t\t<div class=\"clear\">
\t\t</div>
\t</div>
</div>

<?php if( isset(\$this->latest_installed) && !empty(\$this->latest_installed)):?>
<script>
element = document.getElementById(\"<?= \$this->latest_installed; ?>\");
element.scrollIntoView();
</script>
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
        return "@pct_themer/backend/be_pct_demoinstaller.html5";
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
\$strToken = \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
?>

<div id=\"pct_demoinstaller\" class=\"contao-ht35\">
\t<!-- category select -->
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t
\t<div class=\"tl_formbody\">
\t\t<div class=\"tl_panel categories\">
\t\t<div class=\"float_box\"><?= \$this->categoryWidget; ?></div>
\t\t<div class=\"float_box\">
\t\t\t<?php 
\t\t\t\$img_reload = 'system/themes/flexible/icons/filter-apply.svg';
\t\t\t?>
\t\t\t<input type=\"image\" name=\"filter\" id=\"filter\" src=\"<?= \$img_reload; ?>\" class=\"tl_img_submit\" alt=\"ok\">
\t\t</div>
\t\t<div class=\"clear\"></div>
\t\t</div>
\t</div>
\t</form>
\t
\t<div id=\"tl_buttons\">
\t  <a href=\"<?= \$this->href ?>\" class=\"header_back\" title=\"<?= \$this->title ?>\"><?= \$this->button ?></a>
\t</div>
\t
\t<?php if(\$this->contaoThemeWidget): ?>
\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"tl_filter\">
\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t<div id=\"contao_theme_select\">
\t\t<?= \$this->contaoThemeWidget; ?>
\t</div>
\t</form>
\t<?php endif;?>
\t
\t<?php if(\$this->messages) :?>
\t<?= \$this->messages; ?>
\t<?php endif; ?>
\t
\t<div class=\"content_wrapper form_wrapper\">
\t\t<div class=\"counter\"><?= sprintf(\$GLOBALS['TL_LANG']['pct_demoinstaller']['counter'],count(\$this->themes)); ?></div>
\t\t
\t\t<div class=\"inside grid_wrapper\">
\t\t<?php foreach(\$this->themes as \$theme => \$data): ?>
\t\t<div id=\"<?= \$theme; ?>\" class=\"<?= \$data['class']; ?> block <?php if(\$data['installed']): ?> installed<?php endif; ?>\">
\t\t\t<div class=\"inside\">
\t\t\t\t<form action=\"<?= \$this->action; ?>\" class=\"tl_form\" method='post'>
\t\t\t\t<input type=\"hidden\" name=\"FORM_SUBMIT\" value=\"pct_demoinstaller\">
\t\t\t\t<input type=\"hidden\" name=\"REQUEST_TOKEN\" value=\"<?= \$strToken; ?>\">
\t\t\t\t<input type=\"hidden\" name=\"THEME\" value=\"<?= \$theme; ?>\">
\t\t\t\t<div class=\"content<?php if(\$data['installed']): ?> demo_installed<?php endif; ?>\">
\t\t\t\t<div class=\"label\"><?= \$data['label']; ?></div>
\t\t\t\t\t<div class=\"image_container\">
\t\t\t\t\t\t<?php if(\$data['installed']): ?>
\t\t\t\t\t\t<a href=\"<?= \$data['feRedirect']; ?>\" target=\"_blank\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['target'][0]; ?>\">
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<?= \$data['img']; ?>
\t\t\t\t\t\t<?php if(\$data['installed']): ?>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"submit_container\">
\t\t\t\t\t\t<?php if(!\$data['installed']): ?>
\t\t\t\t\t\t<div class=\"submit install\"><input type=\"submit\" class=\"di_submit text\" name=\"install\" value=\"<?= \$GLOBALS['TL_LANG']['pct_demoinstaller']['submit_install'] ?: 'Install'; ?>\"></div>
\t\t\t\t\t\t<?php else: ?>
\t\t\t\t\t\t<?php 
\t\t\t\t\t\t\$label = \$this->showLabel;
\t\t\t\t\t\tif(\$data['installed'] && (boolean)\\Contao\\Config::get('pct_themedesigner_hidden') === false)
\t\t\t\t\t\t{
\t\t\t\t\t\t\t\$label = \$this->customizeLabel;
\t\t\t\t\t\t}
\t\t\t\t\t\t?>
\t\t\t\t\t\t<div class=\"submit show\"><a href=\"<?php if(\$data['installed']): ?><?= \$data['feRedirect']; ?><?php endif; ?>\" target=\"_blank\" class=\"di_submit text\" title=\"<?= \$GLOBALS['TL_LANG']['MSC']['target'][0]; ?>\"><?= \$label; ?></a></div>
\t\t\t\t\t\t<?php endif; ?>
\t\t\t\t\t\t<div class=\"submit preview\"><a href=\"<?= \$data['link']; ?>\" target=\"_blank\" tile=\"Preview: <?= \$data['label']; ?>\"><?= \$GLOBALS['TL_LANG']['pct_demoinstaller']['submit_preview']; ?></a></div>\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t\t<?php endforeach; ?>
\t\t
\t\t<div class=\"clear\">
\t\t</div>
\t</div>
</div>

<?php if( isset(\$this->latest_installed) && !empty(\$this->latest_installed)):?>
<script>
element = document.getElementById(\"<?= \$this->latest_installed; ?>\");
element.scrollIntoView();
</script>
<?php endif; ?>", "@pct_themer/backend/be_pct_demoinstaller.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/backend/be_pct_demoinstaller.html5");
    }
}
