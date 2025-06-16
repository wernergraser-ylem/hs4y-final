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

/* @ContaoCore/Image/Studio/_macros.html.twig */
class __TwigTemplate_3a4079262fa6aa11e2521530de009b69 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Image/Studio/_macros.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ContaoCore/Image/Studio/_macros.html.twig"));

        // line 2
        yield "
";
        // line 42
        yield "
";
        // line 101
        yield "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 49
    public function macro_figure($figure = null, $options = [], $addSchemaOrg = true, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "addSchemaOrg" => $addSchemaOrg,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "figure"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "figure"));

            // line 50
            $context["figure_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 50), "attr", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 50, $this->source); })()), "options", [], "any", false, false, false, 50), "attr", [], "any", false, false, false, 50), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "attr", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 50, $this->source); })()), "attr", [], "any", false, false, false, 50), [])) : ([])));
            // line 51
            $context["link_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 51), "link_attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 51, $this->source); })()), "options", [], "any", false, false, false, 51), "link_attr", [], "any", false, false, false, 51), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "link_attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 51, $this->source); })()), "link_attr", [], "any", false, false, false, 51), [])) : ([])));
            yield "
    <figure";
            // line 52
            yield $this->getTemplateForMacro("macro_html_attributes", $context, 52, $this->getSourceContext())->macro_html_attributes(...[(isset($context["figure_attributes"]) || array_key_exists("figure_attributes", $context) ? $context["figure_attributes"] : (function () { throw new RuntimeError('Variable "figure_attributes" does not exist.', 52, $this->source); })())]);
            yield ">
        ";
            // line 53
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 53, $this->source); })()), "linkHref", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                $context["base_attributes"] = Twig\Extension\CoreExtension::merge(["href" => CoreExtension::getAttribute($this->env, $this->source,                 // line 55
(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 55, $this->source); })()), "linkHref", [], "any", false, false, false, 55), "title" => (((CoreExtension::getAttribute($this->env, $this->source,                 // line 56
(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 56, $this->source); })()), "hasLightbox", [], "any", false, false, false, 56) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 56, $this->source); })()), "hasMetadata", [], "any", false, false, false, 56))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 56, $this->source); })()), "metadata", [], "any", false, false, false, 56), "title", [], "any", false, false, false, 56)) : (null))], CoreExtension::getAttribute($this->env, $this->source,                 // line 57
(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 57, $this->source); })()), "linkAttributes", [], "any", false, false, false, 57));
                // line 58
                yield "<a";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 58, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge((isset($context["base_attributes"]) || array_key_exists("base_attributes", $context) ? $context["base_attributes"] : (function () { throw new RuntimeError('Variable "base_attributes" does not exist.', 58, $this->source); })()), (isset($context["link_attributes"]) || array_key_exists("link_attributes", $context) ? $context["link_attributes"] : (function () { throw new RuntimeError('Variable "link_attributes" does not exist.', 58, $this->source); })()))]);
                yield ">
";
                // line 59
                yield $this->getTemplateForMacro("macro_picture", $context, 59, $this->getSourceContext())->macro_picture(...[(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 59, $this->source); })()), (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 59, $this->source); })())]);
                yield "
            </a>";
            } else {
                // line 62
                yield $this->getTemplateForMacro("macro_picture", $context, 62, $this->getSourceContext())->macro_picture(...[(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 62, $this->source); })()), (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 62, $this->source); })())]);
            }
            // line 64
            yield "        ";
            yield $this->getTemplateForMacro("macro_caption", $context, 64, $this->getSourceContext())->macro_caption(...[(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 64, $this->source); })()), (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 64, $this->source); })())]);
            yield "
    </figure>
    ";
            // line 66
            if ((($tmp = (isset($context["addSchemaOrg"]) || array_key_exists("addSchemaOrg", $context) ? $context["addSchemaOrg"] : (function () { throw new RuntimeError('Variable "addSchemaOrg" does not exist.', 66, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                $this->env->getRuntime('Contao\CoreBundle\Twig\Runtime\SchemaOrgRuntime')->add(CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 67, $this->source); })()), "schemaOrgData", [], "any", false, false, false, 67));
            }
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 76
    public function macro_picture($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "picture"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "picture"));

            // line 77
            $context["picture_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 77), "picture_attr", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 77, $this->source); })()), "options", [], "any", false, false, false, 77), "picture_attr", [], "any", false, false, false, 77), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "picture_attr", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 77, $this->source); })()), "picture_attr", [], "any", false, false, false, 77), [])) : ([])));
            // line 78
            $context["source_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 78), "source_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 78, $this->source); })()), "options", [], "any", false, false, false, 78), "source_attr", [], "any", false, false, false, 78), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "source_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 78, $this->source); })()), "source_attr", [], "any", false, false, false, 78), [])) : ([])));
            // line 80
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 80, $this->source); })()), "image", [], "any", false, false, false, 80), "sources", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 81
                yield "<picture";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 81, $this->getSourceContext())->macro_html_attributes(...[(isset($context["picture_attributes"]) || array_key_exists("picture_attributes", $context) ? $context["picture_attributes"] : (function () { throw new RuntimeError('Variable "picture_attributes" does not exist.', 81, $this->source); })())]);
                yield ">
            ";
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 82, $this->source); })()), "image", [], "any", false, false, false, 82), "sources", [], "any", false, false, false, 82));
                foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                    // line 83
                    $context["define_proportions"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 83), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 83), false)) : (false)));
                    // line 84
                    $context["base_attributes"] = ["srcset" => CoreExtension::getAttribute($this->env, $this->source,                     // line 85
$context["source"], "srcset", [], "any", false, false, false, 85), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 86
$context["source"], "sizes", [], "any", true, true, false, 86)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "sizes", [], "any", false, false, false, 86), null)) : (null)), "media" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 87
$context["source"], "media", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "media", [], "any", false, false, false, 87), null)) : (null)), "type" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 88
$context["source"], "type", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "type", [], "any", false, false, false, 88), null)) : (null)), "width" => (((($tmp =                     // line 89
(isset($context["define_proportions"]) || array_key_exists("define_proportions", $context) ? $context["define_proportions"] : (function () { throw new RuntimeError('Variable "define_proportions" does not exist.', 89, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 89)) : (null)), "height" => (((($tmp =                     // line 90
(isset($context["define_proportions"]) || array_key_exists("define_proportions", $context) ? $context["define_proportions"] : (function () { throw new RuntimeError('Variable "define_proportions" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 90)) : (null))];
                    // line 92
                    yield "<source";
                    yield $this->getTemplateForMacro("macro_html_attributes", $context, 92, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge((isset($context["base_attributes"]) || array_key_exists("base_attributes", $context) ? $context["base_attributes"] : (function () { throw new RuntimeError('Variable "base_attributes" does not exist.', 92, $this->source); })()), (isset($context["source_attributes"]) || array_key_exists("source_attributes", $context) ? $context["source_attributes"] : (function () { throw new RuntimeError('Variable "source_attributes" does not exist.', 92, $this->source); })()))]);
                    yield ">";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['source'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 94
                yield "
            ";
                // line 95
                yield $this->getTemplateForMacro("macro_img", $context, 95, $this->getSourceContext())->macro_img(...[(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 95, $this->source); })()), (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 95, $this->source); })())]);
                yield "
        </picture>";
            } else {
                // line 98
                yield "        ";
                yield $this->getTemplateForMacro("macro_img", $context, 98, $this->getSourceContext())->macro_img(...[(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 98, $this->source); })()), (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 98, $this->source); })())]);
            }
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 105
    public function macro_img($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "img"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "img"));

            // line 106
            $context["img_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 106), "img_attr", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 106, $this->source); })()), "options", [], "any", false, false, false, 106), "img_attr", [], "any", false, false, false, 106), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "img_attr", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 106, $this->source); })()), "img_attr", [], "any", false, false, false, 106), [])) : ([])));
            // line 107
            yield "
    ";
            // line 108
            $context["img"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 108, $this->source); })()), "image", [], "any", false, false, false, 108), "img", [], "any", false, false, false, 108);
            // line 109
            yield "    ";
            $context["define_proportions"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 109, $this->source); })()), "width", [], "any", false, false, false, 109), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 109, $this->source); })()), "height", [], "any", false, false, false, 109), false)) : (false)));
            // line 110
            yield "
    ";
            // line 111
            $context["base_attributes"] = ["src" => CoreExtension::getAttribute($this->env, $this->source,             // line 112
(isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 112, $this->source); })()), "src", [], "any", false, false, false, 112), "alt" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 113
(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 113, $this->source); })()), "hasMetadata", [], "any", false, false, false, 113)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 113, $this->source); })()), "metadata", [], "any", false, false, false, 113), "alt", [], "any", false, false, false, 113)) : ("")), "title" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 114
(isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 114, $this->source); })()), "hasMetadata", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 114, $this->source); })()), "metadata", [], "any", false, false, false, 114), "title", [], "any", false, false, false, 114)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 114, $this->source); })()), "metadata", [], "any", false, false, false, 114), "title", [], "any", false, false, false, 114)) : (null))) : (null)), "srcset" => (((CoreExtension::getAttribute($this->env, $this->source,             // line 115
($context["img"] ?? null), "srcset", [], "any", true, true, false, 115) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 115, $this->source); })()), "srcset", [], "any", false, false, false, 115) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 115, $this->source); })()), "src", [], "any", false, false, false, 115)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 115, $this->source); })()), "srcset", [], "any", false, false, false, 115)) : (null)), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 116
($context["img"] ?? null), "sizes", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 116, $this->source); })()), "sizes", [], "any", false, false, false, 116), null)) : (null)), "width" => (((($tmp =             // line 117
(isset($context["define_proportions"]) || array_key_exists("define_proportions", $context) ? $context["define_proportions"] : (function () { throw new RuntimeError('Variable "define_proportions" does not exist.', 117, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 117, $this->source); })()), "width", [], "any", false, false, false, 117)) : (null)), "height" => (((($tmp =             // line 118
(isset($context["define_proportions"]) || array_key_exists("define_proportions", $context) ? $context["define_proportions"] : (function () { throw new RuntimeError('Variable "define_proportions" does not exist.', 118, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 118, $this->source); })()), "height", [], "any", false, false, false, 118)) : (null)), "loading" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 119
($context["img"] ?? null), "loading", [], "any", true, true, false, 119)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 119, $this->source); })()), "loading", [], "any", false, false, false, 119), null)) : (null)), "class" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 120
($context["img"] ?? null), "class", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 120, $this->source); })()), "class", [], "any", false, false, false, 120), null)) : (null))];
            // line 122
            yield "    <img";
            yield $this->getTemplateForMacro("macro_html_attributes", $context, 122, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge((isset($context["base_attributes"]) || array_key_exists("base_attributes", $context) ? $context["base_attributes"] : (function () { throw new RuntimeError('Variable "base_attributes" does not exist.', 122, $this->source); })()), (isset($context["img_attributes"]) || array_key_exists("img_attributes", $context) ? $context["img_attributes"] : (function () { throw new RuntimeError('Variable "img_attributes" does not exist.', 122, $this->source); })()))]);
            yield ">";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 130
    public function macro_caption($figure = null, $options = [], ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "figure" => $figure,
            "options" => $options,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "caption"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "caption"));

            // line 131
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 131, $this->source); })()), "hasMetadata", [], "any", false, false, false, 131) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 131, $this->source); })()), "metadata", [], "any", false, false, false, 131), "caption", [], "any", false, false, false, 131))) {
                // line 132
                yield "        ";
                $context["caption_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 132), "caption_attr", [], "any", true, true, false, 132)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 132, $this->source); })()), "options", [], "any", false, false, false, 132), "caption_attr", [], "any", false, false, false, 132), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "caption_attr", [], "any", true, true, false, 132)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 132, $this->source); })()), "caption_attr", [], "any", false, false, false, 132), [])) : ([])));
                // line 133
                yield "        <figcaption";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 133, $this->getSourceContext())->macro_html_attributes(...[(isset($context["caption_attributes"]) || array_key_exists("caption_attributes", $context) ? $context["caption_attributes"] : (function () { throw new RuntimeError('Variable "caption_attributes" does not exist.', 133, $this->source); })())]);
                yield ">";
                // line 134
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["figure"]) || array_key_exists("figure", $context) ? $context["figure"] : (function () { throw new RuntimeError('Variable "figure" does not exist.', 134, $this->source); })()), "metadata", [], "any", false, false, false, 134), "caption", [], "any", false, false, false, 134);
                // line 135
                yield "</figcaption>
    ";
            }
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 149
    public function macro_html_attributes($attributes = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "attributes" => $attributes,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "html_attributes"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "html_attributes"));

            // line 150
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 150, $this->source); })()), function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return  !(null === (isset($context["v"]) || array_key_exists("v", $context) ? $context["v"] : (function () { throw new RuntimeError('Variable "v" does not exist.', 150, $this->source); })())); }));
            foreach ($context['_seq'] as $context["attr"] => $context["value"]) {
                // line 151
                yield $this->env->getFilter('escape')->getCallable()($this->env, (" " . $context["attr"]), "contao_html", null, true);
                if ((($tmp = $context["value"]) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "=\"";
                    yield $this->env->getFilter('escape')->getCallable()($this->env, $context["value"], "contao_html", null, true);
                    yield "\"";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['attr'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ContaoCore/Image/Studio/_macros.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  334 => 151,  330 => 150,  312 => 149,  298 => 135,  296 => 134,  292 => 133,  289 => 132,  287 => 131,  268 => 130,  254 => 122,  252 => 120,  251 => 119,  250 => 118,  249 => 117,  248 => 116,  247 => 115,  246 => 114,  245 => 113,  244 => 112,  243 => 111,  240 => 110,  237 => 109,  235 => 108,  232 => 107,  230 => 106,  211 => 105,  197 => 98,  192 => 95,  189 => 94,  181 => 92,  179 => 90,  178 => 89,  177 => 88,  176 => 87,  175 => 86,  174 => 85,  173 => 84,  171 => 83,  167 => 82,  162 => 81,  160 => 80,  158 => 78,  156 => 77,  137 => 76,  124 => 67,  122 => 66,  116 => 64,  113 => 62,  108 => 59,  103 => 58,  101 => 57,  100 => 56,  99 => 55,  98 => 54,  96 => 53,  92 => 52,  88 => 51,  86 => 50,  66 => 49,  54 => 101,  51 => 42,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# @var \\Contao\\CoreBundle\\Image\\Studio\\Figure figure #}

{#
    Studio Macros
    -------------
    This collection of Twig macros is intended to help you render figure/image
    markup directly from a Studio\\Figure. You can use these macros as building
    blocks for your own figure template or to render the whole thing and pass
    some options.


    Options
    -------
    By setting options, the default output can be altered. There are two places
    where this can be done:

      1) By constructing a Studio\\Figure object with \$options
      2) By passing the \$options argument to the macros

     If the same keys are defined in both 1) and 2), the template options
     will have precedence.

     Currently, options allow you to extend/overwrite HTML attributes for all
     tags that are output. Attributes defined under the 'attr' key will be
     placed inside the <figure> tag while those defined under the '%tag%_attr'
     key will end up inside the <%tag%> tag.

     Example:

        {{ _self.figure(figure, {
            attr: { data-foo: 'a' },
            figcaption_attr: { class: 'bar' }
        } }}

        :  <figure data-foo=\"a\">
        :    ...
        :    <figcaption class=\"bar\">
        :      ...
        :    </figcaption>
        :  </figure>
#}

{#
    Build a <figure> including a picture and - if available - a caption from
    Studio\\Figure data.

    If a link is defined the picture will be wrapped in an <a> tag.
#}
{%- macro figure(figure, options = {}, addSchemaOrg = true) -%}
    {%- set figure_attributes = figure.options.attr|default({})|merge(options.attr|default({})) %}
    {%- set link_attributes = figure.options.link_attr|default({})|merge(options.link_attr|default({})) ~%}
    <figure{{ _self.html_attributes(figure_attributes) }}>
        {% if figure.linkHref -%}
            {%- set base_attributes = {
                'href': figure.linkHref,
                'title': figure.hasLightbox and figure.hasMetadata ? figure.metadata.title : null,
            }|merge(figure.linkAttributes) -%}
            <a{{ _self.html_attributes(base_attributes|merge(link_attributes)) }}>
                {{~ _self.picture(figure, options) }}
            </a>
        {%- else %}
            {{- _self.picture(figure, options) -}}
        {% endif %}
        {{ _self.caption(figure, options) }}
    </figure>
    {% if addSchemaOrg %}
        {%- do add_schema_org(figure.schemaOrgData) -%}
    {% endif %}
{%- endmacro -%}

{#
    Build a <picture> from Studio\\Figure data.

    This falls back to only creating a single <img> if no sources are present.
#}
{% macro picture(figure, options = {}) %}
    {%- set picture_attributes = figure.options.picture_attr|default({})|merge(options.picture_attr|default({})) %}
    {%- set source_attributes = figure.options.source_attr|default({})|merge(options.source_attr|default({})) %}

    {%- if figure.image.sources -%}
        <picture{{ _self.html_attributes(picture_attributes) }}>
            {% for source in figure.image.sources %}
                {%- set define_proportions = source.width|default(false) and source.height|default(false) -%}
                {%- set base_attributes = {
                    'srcset': source.srcset,
                    'sizes': source.sizes|default(null),
                    'media': source.media|default(null),
                    'type': source.type|default(null),
                    'width': define_proportions ? source.width : null,
                    'height': define_proportions ? source.height : null,
                } -%}
                <source{{ _self.html_attributes(base_attributes|merge(source_attributes)) }}>
            {%- endfor %}

            {{ _self.img(figure, options) }}
        </picture>
    {%- else %}
        {{ _self.img(figure, options) }}
    {%- endif %}
{% endmacro %}

{#
    Build an <img> from Studio\\Figure data.
#}
{%- macro img(figure, options = {}) -%}
    {% set img_attributes = figure.options.img_attr|default({})|merge(options.img_attr|default({})) %}

    {% set img = figure.image.img %}
    {% set define_proportions = img.width|default(false) and img.height|default(false) %}

    {% set base_attributes = {
        'src': img.src,
        'alt': figure.hasMetadata ? figure.metadata.alt : '',
        'title': figure.hasMetadata ? (figure.metadata.title ?: null) : null,
        'srcset': img.srcset is defined and img.srcset != img.src ? img.srcset : null,
        'sizes': img.sizes|default(null),
        'width': define_proportions ? img.width : null,
        'height': define_proportions ? img.height : null,
        'loading': img.loading|default(null),
        'class': img.class|default(null),
    } %}
    <img{{ _self.html_attributes(base_attributes|merge(img_attributes)) }}>
{%- endmacro -%}

{#
    Build a <figcaption> from Studio\\Figure data.

    If no metadata is present, nothing will be output.
#}
{%- macro caption(figure, options = {}) -%}
    {% if figure.hasMetadata and figure.metadata.caption %}
        {% set caption_attributes = figure.options.caption_attr|default({})|merge(options.caption_attr|default({})) %}
        <figcaption{{ _self.html_attributes(caption_attributes) }}>
            {{- figure.metadata.caption|raw -}}
        </figcaption>
    {% endif %}
{%- endmacro -%}

{#
    Helper: Expand an associative mapping into HTML attributes.

     - Values that are null won't be included
     - The output will contain a leading space

    Example:

        { 'foo': 'a', 'bar': 'b', 'foobar': null } --> ' foo=\"a\" bar=\"b\"'
#}
{%- macro html_attributes(attributes) -%}
    {%- for attr, value in attributes|filter(v => v is not null) -%}
        {{ ' ' ~ attr }}{% if value %}=\"{{ value }}\"{% endif %}
    {%- endfor -%}
{%- endmacro -%}
", "@ContaoCore/Image/Studio/_macros.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Image/Studio/_macros.html.twig");
    }
}
