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

/* @pct_themer/themedesigner/td_devices_and_zoom.html5 */
class __TwigTemplate_853c33075975691b1b8e10f8961b07b7 extends Template
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
        yield "<div id=\"device_and_zoom\">
\t<ul class=\"devices\">
\t\t<li class=\"desktop<?php if(\$this->device == 'desktop'): ?> active <?php endif; ?>\" data-value=\"desktop\"></li>
\t\t<li class=\"tablet_portrait<?php if(\$this->device == 'tablet_portait'): ?> active <?php endif; ?>\" data-value=\"tablet_portait\"></li>
\t\t<li class=\"tablet_landscape<?php if(\$this->device == 'tablet_landscape'): ?> active <?php endif; ?>\" data-value=\"tablet_landscape\"></li>
\t\t<li class=\"mobile<?php if(\$this->device == 'mobile'): ?> active <?php endif; ?>\" data-value=\"mobile\"></li>
\t</ul>
\t<ul class=\"zoom\">
\t\t<li class=\"z100<?php if(\$this->zoom == '100'): ?> active <?php endif; ?>\" data-value=\"100\">100%</li>
\t\t<li class=\"z75<?php if(\$this->zoom == '75'): ?> active <?php endif; ?>\" data-value=\"75\">75%</li>
\t\t<li class=\"z50<?php if(\$this->zoom == '50'): ?> active <?php endif; ?>\" data-value=\"50\">50%</li>
\t</ul>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_themer/themedesigner/td_devices_and_zoom.html5";
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
        return new Source("", "@pct_themer/themedesigner/td_devices_and_zoom.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_themer/templates/themedesigner/td_devices_and_zoom.html5");
    }
}
