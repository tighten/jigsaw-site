import Prism from 'prismjs';
import 'prismjs/components/prism-markup';
import 'prismjs/components/prism-markup-templating';
import 'prismjs/components/prism-php';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-bash';
import 'prismjs/components/prism-markdown';
import 'prismjs/components/prism-yaml';
import 'prismjs/components/prism-nginx';
import 'prismjs/components/prism-toml';
import 'prismjs/plugins/line-numbers/prism-line-numbers';
import './prism-blade.js';

document.addEventListener('DOMContentLoaded', () => {
    Prism.highlightAll();
});
