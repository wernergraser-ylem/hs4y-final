<?php

declare(strict_types=1);

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\CoreBundle\Twig\Interop;

use Twig\Attribute\FirstClassTwigCallableReady;
use Twig\Environment;
use Twig\Node\Expression\ConstantExpression;
use Twig\Node\Expression\FilterExpression;
use Twig\Node\ModuleNode;
use Twig\Node\Node;
use Twig\NodeVisitor\EscaperNodeVisitor;
use Twig\NodeVisitor\NodeVisitorInterface;

/**
 * This NodeVisitor alters all "escape('html')" and "escape('html_attr')" filter
 * expressions into "escape('contao_html')" and "escape('contao_html_attr')"
 * filter expressions if the template they belong to is amongst the configured
 * affected templates.
 *
 * @experimental
 */
final class ContaoEscaperNodeVisitor implements NodeVisitorInterface
{
    private array|null $escaperFilterNodes = null;

    public function __construct(
        /**
         * We evaluate affected templates on the fly so that rules can be adjusted after
         * building the container. Expects a list of regular expressions to be returned. A
         * template counts as "affected" if it matches any of the rules.
         */
        private readonly \Closure $rules,
    ) {
    }

    /**
     * Make sure to run after the EscaperNodeVisitor.
     *
     * @see EscaperNodeVisitor
     */
    public function getPriority(): int
    {
        return 1;
    }

    public function enterNode(Node $node, Environment $env): Node
    {
        $isAffected = static function (array $rules, string $name): bool {
            foreach ($rules as $rule) {
                if (1 === preg_match($rule, $name)) {
                    return true;
                }
            }

            return false;
        };

        if ($node instanceof ModuleNode && $isAffected(($this->rules)(), $node->getTemplateName() ?? '')) {
            $this->escaperFilterNodes = [];
        } elseif (
            null !== $this->escaperFilterNodes && $this->isEscaperFilterExpression($node, $strategy)
            && \in_array($strategy, ['html', 'html_attr'], true)
        ) {
            $this->escaperFilterNodes[] = [$node, $strategy];
        }

        return $node;
    }

    public function leaveNode(Node $node, Environment $env): Node
    {
        if ($node instanceof ModuleNode && null !== $this->escaperFilterNodes) {
            foreach ($this->escaperFilterNodes as [$escaperFilterNode, $strategy]) {
                $this->setContaoEscaperArguments($escaperFilterNode, $strategy);
            }

            $this->escaperFilterNodes = null;
        }

        return $node;
    }

    /**
     * @param-out string $type
     */
    private function isEscaperFilterExpression(Node $node, string|null &$type = null): bool
    {
        $type = '';

        if (!$node instanceof FilterExpression || !$node->getNode('arguments')->hasNode('0')) {
            return false;
        }

        $argument = $node->getNode('arguments')->getNode('0');

        if (!$argument instanceof ConstantExpression) {
            return false;
        }

        // TODO: Always use "$node->getAttribute('twig_callable')->getName()" as soon as
        // we require at least Twig 3.12.
        $filterName = class_exists(FirstClassTwigCallableReady::class)
            ? $node->getAttribute('twig_callable')->getName()
            : $node->getNode('filter')->getAttribute('value');

        if (!\in_array($filterName, ['escape', 'e'], true)) {
            return false;
        }

        $doubleEncode = $node->getNode('arguments')->hasNode('double_encode') ? $node->getNode('arguments')->getNode('double_encode') : null;

        if ($doubleEncode instanceof ConstantExpression && \is_bool($doubleEncode->getAttribute('value'))) {
            $node->getNode('arguments')->removeNode('double_encode');

            // Do not use the Contao escaper if `double_encode = true` is passed
            if ($doubleEncode->getAttribute('value')) {
                return false;
            }
        }

        $type = $argument->getAttribute('value');

        return true;
    }

    private function setContaoEscaperArguments(FilterExpression $node, string $strategy): void
    {
        $line = $node->getTemplateLine();

        $arguments = new Node([
            new ConstantExpression("contao_$strategy", $line),
            new ConstantExpression(null, $line),
            new ConstantExpression(true, $line),
        ]);

        $node->setNode('arguments', $arguments);
    }
}
