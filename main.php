<?php
/**
 * WikiPraktik Template
 *
 * @author   Petr Kajzar <petr.kajzar@centrum.cz>
 * @license  GPL-3.0-or-later (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
<?php tpl_metaheaders() ?>
<?php echo tpl_favicon(array('favicon')) ?>
</head>

<body id="dokuwiki__top">

<!-- ********** HEADER ********** -->
<header id="dokuwiki__header">
<?php tpl_includeFile('header.html') ?>
<div id="dokuwiki__header__left">
    <?php tpl_link(wl(),$conf['title'] . ($conf['tagline'] ? '<span class="claim">' . $conf['tagline'] . '</span>' : ''),'accesskey="h" title="[H]"') ?>
</div>
<div id="dokuwiki__header__right">
    <?php tpl_searchform() ?>
</div>
</header><!-- /header -->

<!-- ********** SITE ********** -->
<div id="dokuwiki__site" class="site <?php echo tpl_classes(); ?><?php
    echo ($showSidebar) ? ' showSidebar' : ''; ?><?php echo ($hasSidebar) ? ' hasSidebar' : ''; ?>">

<!-- ********** WRAPPER ********** -->
<div id="site_wrapper" class="wrapper group">
<?php html_msgarea() ?>

<!-- ********** ASIDE ********** -->
<?php if ($showSidebar): ?>
<nav id="dokuwiki__aside" aria-label="<?php echo $lang['sidebar'] ?>">
    <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
</nav><!-- /aside -->
<?php endif; ?>

<!-- ********** BREADCRUMBS ********** -->
<?php if($conf['breadcrumbs']){ ?>
    <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
<?php } ?>
<?php if($conf['youarehere']){ ?>
    <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
<?php } ?>

<!-- ********** CONTENT ********** -->
<main id="dokuwiki__content">
    <?php tpl_flush() ?>

    <div class="page group">
        <!-- wikipage start -->
        <?php tpl_content() ?>
        <!-- wikipage stop -->
    </div>

    <?php tpl_flush() ?>
</main><!-- /content -->

</div><!-- /wrapper -->

<!-- ********** FOOTER ********** -->
<footer id="dokuwiki__footer">
    <div id="dw_menu">
        <?php echo (new \dokuwiki\Menu\MobileMenu())->getDropdown($lang['tools'], 'OK'); ?>
    </div>
    <?php if (strlen(tpl_getConf('footer')) > 0) : ?>
        <div><?php echo tpl_getConf('footer') ?></div>
    <?php endif; ?>
    <?php if (tpl_getConf('wiki')): ?>
        <?php echo (strlen(tpl_pageinfo(true)) > 0 ? '<div>' . tpl_pageinfo(true) . '</div>' : ''); ?>
    <?php endif; ?>
    <div><?php tpl_userinfo(); ?></div>
</footer><!-- /footer -->

</div><!-- /site -->

<div class="license">
    <a href="https://dokuwiki.org/" title="DokuWiki" <?php echo $target?>><img
        src="<?php echo tpl_basedir(); ?>../dokuwiki/images/button-dw.png" width="80" height="15"
        alt="DokuWiki"></a>
    <?php tpl_license($img = 'button', $imgOnly = true, $return = false, $wrap = false) ?>
</div>
<div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>

</body>
</html>
