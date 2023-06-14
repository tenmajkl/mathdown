<?php

namespace Majkel\Mathdown\Nodes\Macros;

use Majkel\Mathdown\Nodes\Node;
use ParseError;

class Greek implements Node, Macro
{ 
    const Possible = [
        'alpha',
        'nu',
        'beta',
        'xi',
        'Xi',
        'gamma',
        'Gamma',
        'delta',
        'Delta',
        'pi',
        'Pi',
        'epsilon',
        'varepsilon',
        'rho',
        'varrho',
        'zeta',
        'sigma',
        'Sigma',
        'eta',
        'tau',
        'theta',
        'vartheta',
        'Theta',
        'upsilon',
        'Upsilon',
        'iota',
        'phi',
        'varphi',
        'Phi',
        'kappa',
        'chi',
        'lambda',
        'Lambda',
        'psi',
        'Psi',
        'mu',
        'omega',
        'Omega',
    ];

    public function __construct(
        public readonly string $letter
    ) {

    }

    public function translate(): string
    {
        return '<mo>&'.$this->letter.'</mo>';
    }
}
