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

/* @pct_revolutionslider/ce_revolutionslider_video.html5 */
class __TwigTemplate_d84abf7975e7fcdbd7e5031459f0f7ad extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/ce_revolutionslider_video.html5"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@pct_revolutionslider/ce_revolutionslider_video.html5"));

        // line 1
        yield "<?php if(\$this->source == 'local'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer videomp4 local<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-videomp4=\"<?= \$this->videomp4; ?>\"
\tdata-videoposter=\"<?= \$this->poster; ?>\"
\tdata-aspectratio=\"16:9\"
\tdata-type=\"video\"
\tdata-volume=\"100\"  
\tdata-forcerewind=\"on\"
\tdata-forceCover=\"1\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-noposteronmobile=\"off\" 
\tdata-videopreload=\"auto\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
</div>
<?php elseif(\$this->source == 'youtube'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer youtube external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-ytid=\"<?= \$this->videoId; ?>\" 
\tdata-videoattributes=\"version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0<?php if(\$this->videoparameters): ?>&<?= \$this->videoparameters; ?><?php endif; ?>\"
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->forceFullWidth): ?>data-forceFullWidth=\"true\"<?php endif; ?>
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
<?php elseif(\$this->source == 'vimeo'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer vimeo external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-vimeoid=\"<?= \$this->videoId; ?>\" 
\tdata-videoattributes=\"background=1&title=0&byline=0&portrait=0&api=1<?php if(\$this->videoparameters): ?>&<?= \$this->videoparameters; ?><?php endif; ?>\"
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php endif; ?>
\t<?php if(\$this->fullscreen): ?>data-forceCover=\"1\"<?php endif; ?>
>
</div>
<?php // custom source
elseif( \$this->source === 'custom' ): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer custom external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
\t<?php if(\$this->fullscreen): ?>data-forceCover=\"1\"<?php endif; ?>
>
<iframe src=\"<?= \$this->url; ?>\" width=\"<?= \$this->width ?: '100%'; ?>\" height=\"<?= \$this->height ?: '100%'; ?>\"></iframe>
</div>
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
        return "@pct_revolutionslider/ce_revolutionslider_video.html5";
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
        return new Source("<?php if(\$this->source == 'local'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer videomp4 local<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-videomp4=\"<?= \$this->videomp4; ?>\"
\tdata-videoposter=\"<?= \$this->poster; ?>\"
\tdata-aspectratio=\"16:9\"
\tdata-type=\"video\"
\tdata-volume=\"100\"  
\tdata-forcerewind=\"on\"
\tdata-forceCover=\"1\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-noposteronmobile=\"off\" 
\tdata-videopreload=\"auto\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
</div>
<?php elseif(\$this->source == 'youtube'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer youtube external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-ytid=\"<?= \$this->videoId; ?>\" 
\tdata-videoattributes=\"version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0<?php if(\$this->videoparameters): ?>&<?= \$this->videoparameters; ?><?php endif; ?>\"
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->forceFullWidth): ?>data-forceFullWidth=\"true\"<?php endif; ?>
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
>
<?php elseif(\$this->source == 'vimeo'): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer vimeo external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-vimeoid=\"<?= \$this->videoId; ?>\" 
\tdata-videoattributes=\"background=1&title=0&byline=0&portrait=0&api=1<?php if(\$this->videoparameters): ?>&<?= \$this->videoparameters; ?><?php endif; ?>\"
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\tdata-exitfullscreenonpause=\"off\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php endif; ?>
\t<?php if(\$this->fullscreen): ?>data-forceCover=\"1\"<?php endif; ?>
>
</div>
<?php // custom source
elseif( \$this->source === 'custom' ): ?>
<div class=\"tp-caption tp-resizeme tp-videolayer custom external<?php if(\$this->class):?> <?= \$this->class; ?><?php endif; ?>\" <?php if(\$this->styles): ?>style=\"<?= \$this->styles; ?>\"<?php endif; ?> 
\t###attributes###
\tdata-aspectratio=\"<?= \$this->aspectratio ?: '16:9'?>\"
\tdata-type=\"video\"
\tdata-volume=\"100\"
\tdata-forcerewind=\"true\"
\tdata-videowidth=\"<?= \$this->width ?: '100%'; ?>\"
\tdata-videoheight=\"<?= \$this->height ?: '100%'; ?>\"
\t<?php if(\$this->autoplay): ?>data-autoplay=\"on\"<?php else: ?>data-autoplay=\"off\"<?php endif; ?>
\t<?php if(\$this->controls): ?>data-videocontrols=\"controls\"<?php else: ?>data-videocontrols=\"none\"<?php endif; ?>
\t<?php if(\$this->nextslideatend): ?>data-nextslideatend=\"true\"<?php else: ?>data-nextslideatend=\"false\"<?php endif; ?>
\t<?php if(\$this->loop): ?>data-videoloop=\"loop\"<?php else: ?>data-videoloop=\"none\"<?php endif; ?>
\t<?php if(\$this->fullscreen): ?>data-forceCover=\"1\"<?php endif; ?>
>
<iframe src=\"<?= \$this->url; ?>\" width=\"<?= \$this->width ?: '100%'; ?>\" height=\"<?= \$this->height ?: '100%'; ?>\"></iframe>
</div>
<?php endif; ?>", "@pct_revolutionslider/ce_revolutionslider_video.html5", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/system/modules/pct_revolutionslider/templates/ce_revolutionslider_video.html5");
    }
}
