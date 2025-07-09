// Prism.js language definition for Laravel Blade templating
import Prism from 'prismjs';
import 'prismjs/components/prism-php';

// Ensure PHP language is available
if (!Prism.languages.php) {
  console.warn('PHP language not loaded for Blade highlighting');
}

// Register Blade language
Prism.languages.blade = {
  'comment': [
    // Blade comments {{-- ... --}}
    {
      pattern: /\{\{--[\s\S]*?--\}\}/,
      greedy: true
    },
    // HTML comments
    {
      pattern: /<!--[\s\S]*?-->/,
      greedy: true
    }
  ],
  'php-block': {
    pattern: /@php\b[\s\S]*?@endphp\b/,
    greedy: true,
    inside: {
      'php-start': {
        pattern: /^@php\b/,
        alias: 'keyword'
      },
      'php-end': {
        pattern: /@endphp\b$/,
        alias: 'keyword'
      },
      'php-content': {
        pattern: /[\s\S]+/,
        inside: {
          'php-start': {
            pattern: /^@php\b/,
            alias: 'keyword'
          },
          'php-end': {
            pattern: /@endphp\b$/,
            alias: 'keyword'
          },
          'php': {
            pattern: /(?:(?!^@php\b|@endphp\b$)[\s\S])+/,
            inside: Prism.languages.php
          }
        }
      }
    }
  },
  'blade-echo': [
    // Escaped output {!! ... !!}
    {
      pattern: /\{!!\s*[\s\S]*?\s*!!\}/,
      greedy: true,
      alias: 'variable',
      inside: {
        'punctuation': /^\{!!|\s*!!\}$/,
        'php': {
          pattern: /[\s\S]+/,
          inside: Prism.languages.php
        }
      }
    },
    // Regular output {{ ... }}
    {
      pattern: /\{\{\s*[\s\S]*?\s*\}\}/,
      greedy: true,
      alias: 'variable',
      inside: {
        'punctuation': /^\{\{|\s*\}\}$/,
        'php': {
          pattern: /[\s\S]+/,
          inside: Prism.languages.php
        }
      }
    }
  ],
  'blade-directive-with-params': {
    pattern: /@[a-zA-Z_][a-zA-Z0-9_]*\s*\([^)]*\)/,
    inside: {
      'directive-name': {
        pattern: /@[a-zA-Z_][a-zA-Z0-9_]*/,
        alias: 'keyword'
      },
      'directive-params': {
        pattern: /\s*\([^)]*\)/,
        inside: {
          'punctuation': /\(|\)/,
          'php': {
            pattern: /[^()]+/,
            inside: Prism.languages.php
          }
        }
      }
    }
  },
  'blade-directive': {
    pattern: /@[a-zA-Z_][a-zA-Z0-9_]*\b/,
    alias: 'keyword'
  },
  'blade-component': {
    pattern: /<x-[\w-]+(?:\s+[\w-]+(?:="[^"]*"|='[^']*'|={[^}]*}|:[^=\s>]+="[^"]*"|:[^=\s>]+='[^']*'|:[^=\s>]+={[^}]*})*)*\s*\/?>/,
    inside: {
      'tag': {
        pattern: /<\/?x-[\w-]+/,
        inside: {
          'punctuation': /^<\/?/,
          'namespace': /^x-/
        }
      },
      'attr-name': {
        pattern: /[\w-]+(?=\s*=)/,
        inside: {
          'namespace': /^:/
        }
      },
      'attr-value': [
        {
          pattern: /=\s*{[^}]*}/,
          inside: {
            'punctuation': [
              /^=\s*\{/,
              /\}$/
            ],
            'php': {
              pattern: /[\s\S]+/,
              inside: Prism.languages.php
            }
          }
        },
        {
          pattern: /=\s*"[^"]*"/,
          inside: {
            'punctuation': [
              /^=\s*"/,
              /"$/
            ]
          }
        },
        {
          pattern: /=\s*'[^']*'/,
          inside: {
            'punctuation': [
              /^=\s*'/,
              /'$/
            ]
          }
        }
      ],
      'punctuation': /\/?>/
    }
  },
  'tag': {
    pattern: /<\/?(?!\d)[^\s>\/=$<%]+(?:\s(?:\s*[^\s>\/=]+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))|(?=[\s/>])))+)?\s*\/?>/,
    greedy: true,
    inside: {
      'tag': {
        pattern: /^<\/?[^\s>\/]+/,
        inside: {
          'punctuation': /^<\/?/,
          'namespace': /^[^\s>\/:]+:/
        }
      },
      'special-attr': {
        pattern: /\s(?:class|id|style|href|src|alt|title|data-[\w-]+)=(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
        inside: {
          'attr-name': /^[^\s=]+/,
          'attr-value': {
            pattern: /=(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
            inside: {
              'punctuation': /^=/,
              'value': {
                pattern: /"[^"]*"|'[^']*'|[^\s'">=]+/,
                inside: {
                  'blade-echo': [
                    {
                      pattern: /\{!!\s*[\s\S]*?\s*!!\}/,
                      greedy: true,
                      inside: {
                        'punctuation': /^\{!!|\s*!!\}$/,
                        'php': {
                          pattern: /[\s\S]+/,
                          inside: Prism.languages.php
                        }
                      }
                    },
                    {
                      pattern: /\{\{\s*[\s\S]*?\s*\}\}/,
                      greedy: true,
                      inside: {
                        'punctuation': /^\{\{|\s*\}\}$/,
                        'php': {
                          pattern: /[\s\S]+/,
                          inside: Prism.languages.php
                        }
                      }
                    }
                  ]
                }
              }
            }
          }
        }
      },
      'attr-value': {
        pattern: /=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,
        inside: {
          'punctuation': [
            /^=/,
            {
              pattern: /^(\s*)["']|["']$/,
              lookbehind: true
            }
          ]
        }
      },
      'punctuation': /\/?>/,
      'attr-name': {
        pattern: /[^\s>\/]+/,
        inside: {
          'namespace': /^[^\s>\/:]+:/
        }
      }
    }
  },
  'entity': /&#?[\da-z]{1,8};/i
};

// Extend existing languages
Prism.languages.insertBefore('blade', 'blade-directive-with-params', {
  'doctype': {
    pattern: /<!DOCTYPE[\s\S]+?>/i,
    greedy: true,
    inside: {
      'doctype-tag': /^<!DOCTYPE/i,
      'punctuation': /[<>]/
    }
  }
});

export default Prism.languages.blade;
