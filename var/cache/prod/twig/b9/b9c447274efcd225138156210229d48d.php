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

/* @pct_theme_templates/customelements/customelement_swiperslider_end.html5 */
class __TwigTemplate_2ecf4de87b192a33d189834450d081cb extends Template
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
        yield "</div>
</div>
<div class=\"swiper-buttons\">
\t<div id=\"swiper-button-prev_<?php echo \$GLOBALS['PCT_FRAMEWORK']['swiper_instance']; ?>\" class=\"swiper-button-prev\"></div>
\t<div id=\"swiper-button-next_<?php echo \$GLOBALS['PCT_FRAMEWORK']['swiper_instance']; ?>\" class=\"swiper-button-next\"></div>
</div>
<div id=\"swiper-pagination_<?php echo \$GLOBALS['PCT_FRAMEWORK']['swiper_instance']; ?>\" class=\"swiper-pagination\"></div>
\t<div class=\"circle\">
\t\t<div class=\"circle-bg\"></div>
\t\t<span>
\t\t\t<i class=\"fa fa-angle-left\"></i>
\t\t\t<i class=\"fa fa-angle-right last\"></i>
\t\t</span>
\t</div>
</div>
</div>
<?php unset(\$GLOBALS['PCT_FRAMEWORK']['swiper_instance']); ?>

";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@pct_theme_templates/customelements/customelement_swiperslider_end.html5";
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
        return new Source("", "@pct_theme_templates/customelements/customelement_swiperslider_end.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_theme_templates/templates/customelements/customelement_swiperslider_end.html5");
    }
}
