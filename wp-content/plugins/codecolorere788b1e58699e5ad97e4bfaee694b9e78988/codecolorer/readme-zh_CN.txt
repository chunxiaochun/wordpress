1. 在什么地方配置代码高亮插件的选项？

代码高亮设置的路径在下拉菜单的“设置”－>“代码高亮”下面.

2. 如何在日志中使用代码高亮显示插件？

请使用[cc lang="lang"]code[/cc]或者<code lang="lang">code</code>这样的语法在您的文章或者评论中插入源代码，您可以省略lang=”lang”部分，这种情况下，代码会被包含在代码块中，并不进行语法高亮显示。在标记中可用的选项包括:

    * lang(字符串) - 源代码的语言
    * tab_zie(整数) - TAB标记的长度
    * line_numbers(布尔,true/false) - 是否显示行号
    * no_links(布尔,true/false) - 是否将关键字链接到官方文档
    * lines(整数) - 代码块行数，超过该行数后将显示垂直滚动条，设为-1则不显示垂直滚动条
    * width(整数) - 以像素点计算的代码块宽度
    * height(整数) - 以像素点计算的代码块高度，当代码行数超过上述lines属性中的设置值时，代码块将显示为本高度
    * theme(字符串) - 代码显示风格(默认支持default, blackboard, dawn, mac-classic, twitlight, vibrant)

3. 代码高亮显示插件都支持哪些语言？

    abap, actionscript, actionscript3, ada, apache, applescript, aptsources, asm,
    asp, autoit, avisynth, bash, basic4gl, bf, blitzbasic, bnf, boo, c, cmac,
    caddcl, cadlisp, cfdg, cfm, cil, cobol, cpp-qt, cpp, csharp, css-gen.cfg, css,
    d, delphi, diff, div, dos, dot, eiffel, email, fortran, freebasic, genero,
    gettext, glsl, gml, gnuplot, groovy, haskell, hq9plus, html4strict, idl, ini,
    inno, intercal, io, java, java5, javascript, kixtart, klonec, klonecpp, latex,
    lisp, lolcode, lotusformulas, lotusscript, lscript, lua, m68k, make, matlab,
    mirc, mpasm, mxml, mysql, nsis, objc, ocaml-brief, ocaml, oobas, oracle11,
    oracle8, pascal, per, perl, php-brief, php, pic16, pixelbender, plsql, povray,
    powershell, progress, prolog, providex, python, qbasic, rails, reg, robots,
    ruby, sas, scala, scheme, scilab, sdlbasic, smalltalk, smarty, sql, tcl,
    teraterm, text, thinbasic, tsql, typoscript, vb, vbnet, verilog, vhdl, vim,
    visualfoxpro, visualprolog, whitespace, winbatch, xml, xorg_conf, xpp, yaml,
    z80.
