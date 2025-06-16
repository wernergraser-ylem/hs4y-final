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

/* @pct_customelements/backend/be_maintenance_vaultupdater.html5 */
class __TwigTemplate_cdb5d3088c8cfd83d31e3295efe4d9e2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_vaultupdater.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_customelements/backend/be_maintenance_vaultupdater.html5"));

        // line 1
        yield "
<div id=\"tl_maintenance_index\" class=\"maintenance_<?php echo \$this->isActive ? 'active' : 'inactive'; ?>\">

  <div id=\"tl_rebuild_index\">
    <h2 class=\"\"><?php echo \$this->headline; ?></h2>



  <p><?php echo \$this->content; ?></p>
  </div>

    <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"get\">
     \t<input type=\"hidden\" name=\"do\" value=\"maintenance\">
        <input type=\"hidden\" name=\"key\" value=\"<?php echo \\Contao\\Input::get('key'); ?>\">
        <input type=\"hidden\" name=\"rt\" value=\"<?php echo \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
        
      <div class=\"tl_submit_container\">
        
        <input type=\"submit\" name=\"back\" id=\"index\" class=\"tl_submit\" value=\"<?php echo \$this->backLabel; ?>\">
      

        <?php if(\\Contao\\Input::get('key') == 'removeAttributeDataFromVault'):?>
\t\t <input type=\"submit\" name=\"removeAttributeDataFromVault\" class=\"tl_submit\" value=\"<?php echo \$this->runLabel; ?>\">
\t\t<?php endif; ?>
      
        \t\t
      
      </div>
    </form>
\t
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
        return "@pct_customelements/backend/be_maintenance_vaultupdater.html5";
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
<div id=\"tl_maintenance_index\" class=\"maintenance_<?php echo \$this->isActive ? 'active' : 'inactive'; ?>\">

  <div id=\"tl_rebuild_index\">
    <h2 class=\"\"><?php echo \$this->headline; ?></h2>



  <p><?php echo \$this->content; ?></p>
  </div>

    <form action=\"<?php echo \$this->action; ?>\" class=\"tl_form\" method=\"get\">
     \t<input type=\"hidden\" name=\"do\" value=\"maintenance\">
        <input type=\"hidden\" name=\"key\" value=\"<?php echo \\Contao\\Input::get('key'); ?>\">
        <input type=\"hidden\" name=\"rt\" value=\"<?php echo \\Contao\\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue(); ?>\">
        
      <div class=\"tl_submit_container\">
        
        <input type=\"submit\" name=\"back\" id=\"index\" class=\"tl_submit\" value=\"<?php echo \$this->backLabel; ?>\">
      

        <?php if(\\Contao\\Input::get('key') == 'removeAttributeDataFromVault'):?>
\t\t <input type=\"submit\" name=\"removeAttributeDataFromVault\" class=\"tl_submit\" value=\"<?php echo \$this->runLabel; ?>\">
\t\t<?php endif; ?>
      
        \t\t
      
      </div>
    </form>
\t
</div>


", "@pct_customelements/backend/be_maintenance_vaultupdater.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_maintenance_vaultupdater.html5");
    }
}
