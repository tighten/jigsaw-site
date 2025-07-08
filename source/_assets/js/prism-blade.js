// Prism.js language definition for Laravel Blade templating
import Prism from 'prismjs';

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
    pattern: /@php\s*[\s\S]*?@endphp/,
    inside: {
      'directive': {
        pattern: /@(?:php|endphp)/,
        alias: 'keyword'
      },
      'php': {
        pattern: /[\s\S]*?(?=@endphp)/,
        inside: Prism.languages.php
      }
    }
  },
  'blade-directive-with-params': {
    pattern: /@(?:extends|include|includeIf|includeWhen|includeUnless|component|can|cannot|canany|auth|guest|hasSection|sectionMissing|json|raw|dd|dump|lang|choice|route|url|asset|mix|vite|old|session|request|cookie|cache|storage|gate|policy|feature|features|user|hasRole|hasPermission|impersonate|stopImpersonation|class|style|disabled|readonly|required|checked|selected|hidden|multiple|placeholder|value|name|id|type|href|src|alt|title|role|aria|data|tabindex|autocomplete|autofocus|defer|async|crossorigin|integrity|rel|target|download|enctype|method|action|novalidate|spellcheck|translate|contenteditable|draggable|dropzone|lang|dir|accesskey|contextmenu|is|itemid|itemprop|itemref|itemscope|itemtype|nonce|slot|about|datatype|inlist|prefix|property|resource|typeof|vocab|autoplay|controls|loop|muted|poster|preload|buffered|cues|default|kind|label|srclang|track|coords|ismap|sizes|srcset|usemap|autofocus|form|formaction|formenctype|formmethod|formnovalidate|formtarget|dirname|maxlength|minlength|pattern|placeholder|readonly|required|size|accept|autocomplete|capture|list|max|min|step|challenge|keytype|keyparams|crossorigin|sandbox|srcdoc|cite|datetime|open|high|low|optimum|span|headers|colspan|rowspan|scope|sorted|abbr|axis|char|charoff|valign|align|bgcolor|cellpadding|cellspacing|frame|rules|summary|border|width|accept-charset|autocomplete|enctype|novalidate|target|accesskey|contenteditable|contextmenu|draggable|dropzone|hidden|spellcheck|tabindex|translate|onclick|ondblclick|onmousedown|onmouseup|onmouseover|onmousemove|onmouseout|onkeypress|onkeydown|onkeyup|onload|onunload|onfocus|onblur|onsubmit|onreset|onselect|onchange|oninput|oninvalid|onsearch|onwheel|oncopy|oncut|onpaste|onabort|oncanplay|oncanplaythrough|oncuechange|ondurationchange|onemptied|onended|onerror|onloadeddata|onloadedmetadata|onloadstart|onpause|onplay|onplaying|onprogress|onratechange|onseeked|onseeking|onstalled|onsuspend|ontimeupdate|onvolumechange|onwaiting|ontoggle|onshow|onsort|onmessage|onstorage|onoffline|ononline|onpopstate|onresize|onhashchange|onbeforeunload|onbeforeprint|onafterprint|onpagehide|onpageshow|copyright|alert|meta|header|footer|sidebar|navigation|breadcrumb|pagination|search|filter|sort|toggle|modal|dropdown|tooltip|popover|accordion|tab|carousel|slider|gallery|lightbox|video|audio|map|chart|graph|table|form|input|textarea|select|checkbox|radio|button|link|image|icon|badge|label|tag|chip|avatar|progress|spinner|loader|skeleton|placeholder|divider|spacer|container|row|column|grid|flex|stack|wrap|center|left|right|top|bottom|middle|start|end|between|around|evenly|stretch|baseline|auto|full|half|quarter|third|fifth|sixth|eighth|tenth|twelfth|screen|min|max|fit|content|none|hidden|visible|block|inline|flex|grid|table|absolute|relative|fixed|sticky|static|z|opacity|shadow|border|rounded|bg|text|font|leading|tracking|space|p|m|w|h|min-w|min-h|max-w|max-h)\b\s*\([^)]*\)/,
    inside: {
      'directive-name': {
        pattern: /^@[a-zA-Z_][a-zA-Z0-9_]*/,
        alias: 'keyword'
      },
      'directive-params': {
        pattern: /\([^)]*\)/,
        inside: {
          'punctuation': /[()]/,
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
  'blade-echo': [
    // Escaped output {!! ... !!}
    {
      pattern: /\{!!\s*[\s\S]*?\s*!!\}/,
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
