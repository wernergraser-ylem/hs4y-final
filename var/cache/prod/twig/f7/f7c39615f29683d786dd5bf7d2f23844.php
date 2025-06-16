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
class __TwigTemplate_88c784f874ed81397aabeded27c6f88e extends Template
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
        // line 2
        yield "
";
        // line 42
        yield "
";
        // line 101
        yield "
";
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
            // line 50
            $context["figure_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 50), "attr", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 50), "attr", [], "any", false, false, false, 50), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "attr", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "attr", [], "any", false, false, false, 50), [])) : ([])));
            // line 51
            $context["link_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 51), "link_attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 51), "link_attr", [], "any", false, false, false, 51), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "link_attr", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "link_attr", [], "any", false, false, false, 51), [])) : ([])));
            yield "
    <figure";
            // line 52
            yield $this->getTemplateForMacro("macro_html_attributes", $context, 52, $this->getSourceContext())->macro_html_attributes(...[($context["figure_attributes"] ?? null)]);
            yield ">
        ";
            // line 53
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "linkHref", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                $context["base_attributes"] = Twig\Extension\CoreExtension::merge(["href" => CoreExtension::getAttribute($this->env, $this->source,                 // line 55
($context["figure"] ?? null), "linkHref", [], "any", false, false, false, 55), "title" => (((CoreExtension::getAttribute($this->env, $this->source,                 // line 56
($context["figure"] ?? null), "hasLightbox", [], "any", false, false, false, 56) && CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 56))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 56), "title", [], "any", false, false, false, 56)) : (null))], CoreExtension::getAttribute($this->env, $this->source,                 // line 57
($context["figure"] ?? null), "linkAttributes", [], "any", false, false, false, 57));
                // line 58
                yield "<a";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 58, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["link_attributes"] ?? null))]);
                yield ">
";
                // line 59
                yield $this->getTemplateForMacro("macro_picture", $context, 59, $this->getSourceContext())->macro_picture(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
                yield "
            </a>";
            } else {
                // line 62
                yield $this->getTemplateForMacro("macro_picture", $context, 62, $this->getSourceContext())->macro_picture(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            }
            // line 64
            yield "        ";
            yield $this->getTemplateForMacro("macro_caption", $context, 64, $this->getSourceContext())->macro_caption(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            yield "
    </figure>
    ";
            // line 66
            if ((($tmp = ($context["addSchemaOrg"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                $this->env->getRuntime('Contao\CoreBundle\Twig\Runtime\SchemaOrgRuntime')->add(CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "schemaOrgData", [], "any", false, false, false, 67));
            }
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
            // line 77
            $context["picture_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 77), "picture_attr", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 77), "picture_attr", [], "any", false, false, false, 77), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "picture_attr", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "picture_attr", [], "any", false, false, false, 77), [])) : ([])));
            // line 78
            $context["source_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 78), "source_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 78), "source_attr", [], "any", false, false, false, 78), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "source_attr", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "source_attr", [], "any", false, false, false, 78), [])) : ([])));
            // line 80
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 80), "sources", [], "any", false, false, false, 80)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 81
                yield "<picture";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 81, $this->getSourceContext())->macro_html_attributes(...[($context["picture_attributes"] ?? null)]);
                yield ">
            ";
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 82), "sources", [], "any", false, false, false, 82));
                foreach ($context['_seq'] as $context["_key"] => $context["source"]) {
                    // line 83
                    $context["define_proportions"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 83), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 83), false)) : (false)));
                    // line 84
                    $context["base_attributes"] = ["srcset" => CoreExtension::getAttribute($this->env, $this->source,                     // line 85
$context["source"], "srcset", [], "any", false, false, false, 85), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 86
$context["source"], "sizes", [], "any", true, true, false, 86)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "sizes", [], "any", false, false, false, 86), null)) : (null)), "media" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 87
$context["source"], "media", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "media", [], "any", false, false, false, 87), null)) : (null)), "type" => ((CoreExtension::getAttribute($this->env, $this->source,                     // line 88
$context["source"], "type", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["source"], "type", [], "any", false, false, false, 88), null)) : (null)), "width" => (((($tmp =                     // line 89
($context["define_proportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "width", [], "any", false, false, false, 89)) : (null)), "height" => (((($tmp =                     // line 90
($context["define_proportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["source"], "height", [], "any", false, false, false, 90)) : (null))];
                    // line 92
                    yield "<source";
                    yield $this->getTemplateForMacro("macro_html_attributes", $context, 92, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["source_attributes"] ?? null))]);
                    yield ">";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['source'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 94
                yield "
            ";
                // line 95
                yield $this->getTemplateForMacro("macro_img", $context, 95, $this->getSourceContext())->macro_img(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
                yield "
        </picture>";
            } else {
                // line 98
                yield "        ";
                yield $this->getTemplateForMacro("macro_img", $context, 98, $this->getSourceContext())->macro_img(...[($context["figure"] ?? null), ($context["options"] ?? null)]);
            }
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
            // line 106
            $context["img_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 106), "img_attr", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 106), "img_attr", [], "any", false, false, false, 106), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "img_attr", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "img_attr", [], "any", false, false, false, 106), [])) : ([])));
            // line 107
            yield "
    ";
            // line 108
            $context["img"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "image", [], "any", false, false, false, 108), "img", [], "any", false, false, false, 108);
            // line 109
            yield "    ";
            $context["define_proportions"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", false, false, false, 109), false)) : (false)) && ((CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", false, false, false, 109), false)) : (false)));
            // line 110
            yield "
    ";
            // line 111
            $context["base_attributes"] = ["src" => CoreExtension::getAttribute($this->env, $this->source,             // line 112
($context["img"] ?? null), "src", [], "any", false, false, false, 112), "alt" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 113
($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 113)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 113), "alt", [], "any", false, false, false, 113)) : ("")), "title" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 114
($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 114), "title", [], "any", false, false, false, 114)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 114), "title", [], "any", false, false, false, 114)) : (null))) : (null)), "srcset" => (((CoreExtension::getAttribute($this->env, $this->source,             // line 115
($context["img"] ?? null), "srcset", [], "any", true, true, false, 115) && (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "srcset", [], "any", false, false, false, 115) != CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "src", [], "any", false, false, false, 115)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "srcset", [], "any", false, false, false, 115)) : (null)), "sizes" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 116
($context["img"] ?? null), "sizes", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "sizes", [], "any", false, false, false, 116), null)) : (null)), "width" => (((($tmp =             // line 117
($context["define_proportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "width", [], "any", false, false, false, 117)) : (null)), "height" => (((($tmp =             // line 118
($context["define_proportions"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "height", [], "any", false, false, false, 118)) : (null)), "loading" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 119
($context["img"] ?? null), "loading", [], "any", true, true, false, 119)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "loading", [], "any", false, false, false, 119), null)) : (null)), "class" => ((CoreExtension::getAttribute($this->env, $this->source,             // line 120
($context["img"] ?? null), "class", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["img"] ?? null), "class", [], "any", false, false, false, 120), null)) : (null))];
            // line 122
            yield "    <img";
            yield $this->getTemplateForMacro("macro_html_attributes", $context, 122, $this->getSourceContext())->macro_html_attributes(...[Twig\Extension\CoreExtension::merge(($context["base_attributes"] ?? null), ($context["img_attributes"] ?? null))]);
            yield ">";
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
            // line 131
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "hasMetadata", [], "any", false, false, false, 131) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 131), "caption", [], "any", false, false, false, 131))) {
                // line 132
                yield "        ";
                $context["caption_attributes"] = Twig\Extension\CoreExtension::merge(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, true, false, 132), "caption_attr", [], "any", true, true, false, 132)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "options", [], "any", false, false, false, 132), "caption_attr", [], "any", false, false, false, 132), [])) : ([])), ((CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "caption_attr", [], "any", true, true, false, 132)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["options"] ?? null), "caption_attr", [], "any", false, false, false, 132), [])) : ([])));
                // line 133
                yield "        <figcaption";
                yield $this->getTemplateForMacro("macro_html_attributes", $context, 133, $this->getSourceContext())->macro_html_attributes(...[($context["caption_attributes"] ?? null)]);
                yield ">";
                // line 134
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["figure"] ?? null), "metadata", [], "any", false, false, false, 134), "caption", [], "any", false, false, false, 134);
                // line 135
                yield "</figcaption>
    ";
            }
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
            // line 150
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, ($context["attributes"] ?? null), function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return  !(null === ($context["v"] ?? null)); }));
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
        return array (  268 => 151,  264 => 150,  252 => 149,  244 => 135,  242 => 134,  238 => 133,  235 => 132,  233 => 131,  220 => 130,  212 => 122,  210 => 120,  209 => 119,  208 => 118,  207 => 117,  206 => 116,  205 => 115,  204 => 114,  203 => 113,  202 => 112,  201 => 111,  198 => 110,  195 => 109,  193 => 108,  190 => 107,  188 => 106,  175 => 105,  167 => 98,  162 => 95,  159 => 94,  151 => 92,  149 => 90,  148 => 89,  147 => 88,  146 => 87,  145 => 86,  144 => 85,  143 => 84,  141 => 83,  137 => 82,  132 => 81,  130 => 80,  128 => 78,  126 => 77,  113 => 76,  106 => 67,  104 => 66,  98 => 64,  95 => 62,  90 => 59,  85 => 58,  83 => 57,  82 => 56,  81 => 55,  80 => 54,  78 => 53,  74 => 52,  70 => 51,  68 => 50,  54 => 49,  48 => 101,  45 => 42,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ContaoCore/Image/Studio/_macros.html.twig", "/var/www/vhosts/handyservice4you.at/update.handyservice4you.at/vendor/contao/core-bundle/templates/Image/Studio/_macros.html.twig");
    }
}
