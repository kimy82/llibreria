<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_a5a0267e178842ce6f24addb95934eaa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script>/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  66 => 25,  50 => 15,  26 => 3,  108 => 36,  105 => 35,  103 => 34,  100 => 33,  73 => 23,  65 => 20,  62 => 24,  59 => 18,  55 => 17,  46 => 14,  43 => 12,  41 => 11,  38 => 10,  29 => 6,  27 => 5,  24 => 2,  22 => 3,  132 => 50,  113 => 36,  107 => 35,  101 => 34,  95 => 33,  89 => 28,  83 => 30,  77 => 30,  71 => 29,  47 => 15,  39 => 12,  28 => 8,  19 => 1,  94 => 30,  91 => 35,  86 => 27,  76 => 15,  70 => 26,  60 => 10,  56 => 9,  52 => 16,  44 => 6,  40 => 5,  35 => 10,  32 => 6,  175 => 46,  171 => 44,  169 => 43,  166 => 42,  162 => 40,  156 => 37,  152 => 35,  123 => 33,  119 => 32,  116 => 31,  114 => 39,  110 => 28,  106 => 26,  102 => 24,  88 => 22,  84 => 21,  81 => 20,  79 => 29,  75 => 28,  64 => 11,  57 => 19,  53 => 12,  48 => 7,  45 => 8,  42 => 12,  36 => 5,  30 => 5,);
    }
}
