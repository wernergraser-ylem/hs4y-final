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
class __TwigTemplate_20966aca1141b178de95e46bf94b031d extends Template
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
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@pct_customelements/backend/be_maintenance_vaultupdater.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_customelements/templates/backend/be_maintenance_vaultupdater.html5");
    }
}
